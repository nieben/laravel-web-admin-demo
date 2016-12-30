<?php

namespace App\Http\Controllers\Admin\Forum;

use App\Post;
use App\PostComment;
use App\PostCommentResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');
        $user = $request->input('user');
        $sectionId = $request->input('section_id');

        $searchParams = [];
        $db = DB::table('ft2_posts');

        if ($title != '') {
            $db->where('ft2_posts.title', 'like', '%'.$title.'%');
            $searchParams['title'] = $title;
        }
        if ($user != '') {
            $db->where(function ($query) use ($user) {
                $query->where('ft2_users.id', $user)
                    ->orWhere('ft2_users.nickname', 'like', '%'.$user.'%');
            });
            $searchParams['user'] = $user;
        }
        if ($sectionId != '') {
            //解析 版块等级_ID 信息
            $sectionIdArr = explode('_', $sectionId);

            if ($sectionIdArr[0] == 1) {  //一级版块
                $db->where('ft2_posts.forum_section_id', $sectionIdArr[1]);
            } elseif ($sectionIdArr[0] == 2) {  //二级版块
                $db->where('ft2_posts.forum_sub_section_id', $sectionIdArr[1]);
            }

            $searchParams['sectionId'] = $sectionId;
        }

        $data['searchParams'] = $searchParams;

        $forumSections = DB::table('ft2_forum_sections')
            ->join('ft2_forum_sub_sections', 'ft2_forum_sub_sections.forum_section_id', '=', 'ft2_forum_sections.id')
            ->select('ft2_forum_sections.name as section_name', 'ft2_forum_sub_sections.*')
            ->orderBy('ft2_forum_sections.sort', 'asc')
            ->orderBy('ft2_forum_sub_sections.sort', 'asc')
            ->get();

        $data['forumSections'] = $this->generateForumSections($forumSections);

        $labels = DB::table('ft2_labels')->get();

        $posts = $db->where('ft2_posts.disabled', '=', 0)
            ->join('ft2_users', 'ft2_users.id', '=', 'ft2_posts.user_id')
            ->join('ft2_forum_sections', 'ft2_forum_sections.id', '=', 'ft2_posts.forum_section_id')
            ->join('ft2_forum_sub_sections', 'ft2_forum_sub_sections.id', '=', 'ft2_posts.forum_sub_section_id')
            ->select('ft2_posts.*', 'ft2_forum_sub_sections.name as sub_section_name',
                'ft2_forum_sections.name as section_name', 'ft2_users.nickname')
            ->orderBy('ft2_posts.created_at', 'desc')
            ->paginate(10);
        $data['posts'] = $this->generatePosts($posts, indexDbSourcesWithPrimarykey($labels));

        $data['active'] = 'forum';

        return view('admin.post.list', $data);
    }

    protected function generateForumSections($forumSections)
    {
        $sectionGenerated = [];

        foreach ($forumSections as $key => $row) {
            $sectionGenerated[$row->forum_section_id]['section'] = [
                'id' => $row->forum_section_id,
                'name' => $row->section_name
            ];

            $sectionGenerated[$row->forum_section_id]['subSections'][] = [
                'id' => $row->id,
                'name' => $row->name
            ];
        }

        return $sectionGenerated;
    }

    protected function generatePosts($posts, $labels)
    {
        foreach ($posts as $key => $row) {
            $labelNames = arrayValuesWithIndex($labels, explode(',', $row->labels) ,'name');
            $posts[$key]->labels_zh = implode(', ', $labelNames);
        }

        return $posts;
    }

    public function edit($id)
    {
        $data['labels'] = DB::table('ft2_labels')
            ->where('disabled', 0)
            ->get();

        $data['active'] = 'forum';

        $post = DB::table('ft2_posts')->where('ft2_posts.id', $id)
            ->join('ft2_users', 'ft2_users.id', '=', 'ft2_posts.user_id')
            ->select('ft2_posts.*', 'ft2_users.avatar', 'ft2_users.mobile',
                'ft2_users.nickname', 'ft2_users.role', 'ft2_users.disabled as user_disabled')
            ->first();
        $labelNames = arrayValuesWithIndex($data['labels'], explode(',', $post->labels) ,'name');
        $post->labels_zh = implode(',', $labelNames);
        $data['post'] = $post;

        //评论
        $comments = DB::table('ft2_post_comments')
            ->where('ft2_post_comments.post_id', $id)
            ->where('ft2_post_comments.disabled', 0)
            ->join('ft2_users', 'ft2_post_comments.user_id', '=', 'ft2_users.id')
            ->orderBy('ft2_post_comments.created_at', 'desc')
            ->select('ft2_post_comments.id as comment_id', 'ft2_post_comments.content', 'ft2_post_comments.created_at', 'ft2_users.mobile', 'ft2_users.nickname', 'ft2_users.avatar')
            ->get();

        //回复
        $responses = DB::table('ft2_post_comment_responses')
            ->where('ft2_post_comment_responses.post_id', $id)
            ->where('ft2_post_comment_responses.disabled', 0)
            ->join('ft2_users', 'ft2_post_comment_responses.user_id', '=', 'ft2_users.id')
            ->orderBy('ft2_post_comment_responses.created_at', 'desc')
            ->select('ft2_post_comment_responses.id as response_id', 'ft2_post_comment_responses.content', 'ft2_post_comment_responses.created_at', 'ft2_users.mobile', 'ft2_users.nickname', 'ft2_users.avatar')
            ->get();

        $responses = array_merge($comments->all(), $responses->all());

        foreach ($responses as $key => $row){
            $createdAt[$key] = $row->created_at;
        }

        if (! empty($createdAt)) {
            array_multisort($createdAt, SORT_DESC, $responses);
        }

        $data['responses'] = $responses;

        $data['defaultAvatar'] = Config::get('constants.DEFAULT_AVATAR');

        return view('admin.post.edit', $data);
    }

    public function disable($id)
    {
        try {
            $post = Post::find($id);

            if (empty($post)) {
                throw new \Exception('未找到该帖子！');
            }

            $post->disabled = 1;
            $post->save();

            return array(
                'error' => 0,
                'message' => '删除成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }

    public function disableComment($type, $id)
    {
        try {
            if ($type == 'comment') {
                $postComment = PostComment::find($id);

                if (empty($postComment)) {
                    throw new \Exception('未找到该评论！');
                }

                $postComment->disabled = 1;
                $postComment->save();
            } elseif ($type == 'response') {
                $postCommentResponse = PostCommentResponse::find($id);

                if (empty($postCommentResponse)) {
                    throw new \Exception('未找到该评论！');
                }

                $postCommentResponse->disabled = 1;
                $postCommentResponse->save();
            } else {
                throw new \Exception('参数错误！');
            }

            return array(
                'error' => 0,
                'message' => '删除成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }
}
