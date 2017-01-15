<?php

namespace App\Http\Controllers;

use App\Label;
use App\Post;
use App\PostComment;
use App\PostCommentResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ForumController extends Controller
{
    public function index()
    {
        View::addExtension('html', 'php');

        return view('dist.forum');
    }

    public function getIndexData()
    {
        try {
            //判断是否登陆
            if ($user = Auth::user()) {
                $data['has_login'] = 1;
                $data['avatar'] = $user->avatar;

                //是否可以发帖
                $userCreateAt = $user->created_at;

                if ((time() - strtotime($userCreateAt)) >= Config::get('constants.CAN_COMMENT_AFTER_REGISTRATION')) {
                    $data['can_post'] = 1;
                } else {
                    $data['can_post'] = 0;
                }
            } else {
                $data['has_login'] = 0;
            }

            //获取版块信息
            $sections = DB::table('ft2_forum_sections')
                ->join('ft2_forum_sub_sections', 'ft2_forum_sections.id', '=', 'ft2_forum_sub_sections.forum_section_id')
                ->where('ft2_forum_sections.disabled', 0)
                ->where('ft2_forum_sub_sections.disabled', 0)
                ->orderBy('ft2_forum_sections.sort', 'asc')
                ->orderBy('ft2_forum_sub_sections.sort', 'asc')
                ->select('ft2_forum_sections.id', 'ft2_forum_sections.name',
                    'ft2_forum_sub_sections.id as sub_id', 'ft2_forum_sub_sections.name as sub_name')
                ->get();

            $data['sections'] = $this->generateSections($sections);

            $data['current_section'] = Config::get('constants.DEFAULT_DISPLAY_SECTION_ID');

            //获取治疗方法标签集
            $treatmentLabels = Label::where('label_category_id', Config::get('constants.TREATMENT_LABEL_CATEGORY_ID'))
                ->where('disabled', 0)
                ->get();

            $data['treatment_labels'] = $this->generateLabels($treatmentLabels);

            $currentSection = DB::table('ft2_forum_sub_sections')
                ->where('id', $data['current_section'])
                ->first();

            if ($currentSection->forum_section_id == Config::get('constants.ALLOW_FILTER_SECTION_ID')) {
                $data['allow_filter'] = 1;
            } else {
                $data['allow_filter'] = 0;
            }

            $labels = indexDbSourcesWithPrimarykey(DB::table('ft2_labels')->get());

            //获取帖子列表
            $posts = Post::join('ft2_users', 'ft2_posts.user_id', '=', 'ft2_users.id')
                ->where('ft2_posts.disabled', '=', 0)
                ->where('ft2_posts.forum_sub_section_id', '=', $data['current_section'])
                ->orderBy('ft2_posts.created_at', 'desc')
                ->select('ft2_posts.*', 'ft2_users.avatar', 'ft2_users.nickname',
                    'ft2_users.pathologic_type', 'ft2_users.genic_mutation', 'ft2_users.diagnosis_time')
                ->paginate(Config::get('constants.DEFAULT_POST_DISPLAY_NUMBER'));

            $data['posts'] = $this->generatePosts($posts, $labels);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function generateLabels($labels)
    {
        $labelsGenerated = [];

        foreach ($labels as $key => $row) {
            $labelsGenerated[] = [
                'id' => $row->id,
                'name' => $row->name,
                'selected' => false
            ];
        }

        return $labelsGenerated;
    }

    protected function generateSections($sections)
    {
        $sectionsGenerated = [];

         foreach ($sections as $key => $row) {
             if (! isset($sectionsGenerated[$row->id]['id'])) {
                 $sectionsGenerated[$row->id]['id'] = $row->id;
                 $sectionsGenerated[$row->id]['name'] = $row->name;
             }

             $sectionsGenerated[$row->id]['sub_sections'][] = [
                 'id' => $row->sub_id,
                 'name' => $row->sub_name,
                 'selected' => $row->sub_id == Config::get('constants.DEFAULT_DISPLAY_SECTION_ID') ? true : false
             ];
         }

         //重新建立从0开始的索引
         return array_values($sectionsGenerated);
    }

    protected function generatePosts($posts, $labels)
    {
        $postsGenerated = [];

        foreach ($posts as $key => $row) {
            $postsGenerated[] = [
                'id' => $row->id,
                'avatar' => $row->avatar,
                'nickname' => $row->nickname,
                'user_labels' => $this->getUserLabels($row),
                'title' => $row->title,
                'labels' => arrayValuesWithIndex($labels, explode(',', $row->labels) ,'name'),
                'create_time' => (string)$row->created_at
            ];
        }

        return $postsGenerated;
    }

    protected function getUserLabels($row)
    {
        $labels = [];

        if ($row->pathologic_type) {
            $labels[] = $row->pathologic_type;
        }

        if ($row->genic_mutation) {
            $labels[] = $row->genic_mutation;
        }

        //几年几个月，如果一个月内则返回多少天
        if ($row->diagnosis_time) {
            $labels[] = getDiagnosisDuration(strtotime($row->diagnosis_time));
        }

        return $labels;
    }

    public function searchPosts(Request $request)
    {
        try {
            //验证参数
            $this->validateSearchPosts($request);

            $sub_section_id = $request->sub_section_id;
            $order = $request->order;
            $genic_mutation = $request->genic_mutation;
            $disease_stage = $request->disease_stage;
            $treatment = $request->treatment;
            $size = $request->size;

            $currentSection = DB::table('ft2_forum_sub_sections')
                ->where('id', $sub_section_id)
                ->first();

            if ($currentSection->forum_section_id == Config::get('constants.ALLOW_FILTER_SECTION_ID')) {
                $data['allow_filter'] = 1;
            } else {
                $data['allow_filter'] = 0;
            }

            //获取帖子列表
            $db = Post::join('ft2_users', 'ft2_posts.user_id', '=', 'ft2_users.id')
                ->where('ft2_posts.disabled', '=', 0)
                ->where('ft2_posts.forum_sub_section_id', '=', $sub_section_id);

            if ($genic_mutation) {
                $db->where('ft2_users.genic_mutation', $genic_mutation);
            }

            if ($disease_stage) {
                $db->where('ft2_users.disease_stage', $disease_stage);
            }

            //治疗方法标签
            if ($treatment) {
                $treatmentArr = explode(',', $treatment);

                $db->where(function ($query) use ($treatmentArr) {
                    foreach ($treatmentArr as $key => $value) {
                        if ($key == 0) {
                            $query->where(DB::raw('find_in_set('.intval($value).', labels)'), '>', 0);
                        } else {
                            $query->orWhere(DB::raw('find_in_set('.intval($value).', labels)'), '>', 0);
                        }
                    }
                });
            }

            if ($order == 0) {  //最新
                $db->orderBy('ft2_posts.created_at', 'desc');
            } else {  //最热
                $db->orderBy('ft2_posts.comment_number', 'desc');
            }

            $posts = $db->select('ft2_posts.*', 'ft2_users.avatar', 'ft2_users.nickname',
                    'ft2_users.pathologic_type', 'ft2_users.genic_mutation', 'ft2_users.diagnosis_time')
                ->paginate($size);

            $labels = indexDbSourcesWithPrimarykey(DB::table('ft2_labels')->get());

            $data['posts'] = $this->generatePosts($posts, $labels);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateSearchPosts($request)
    {
        $this->validate($request, [
            'sub_section_id' => 'required|integer|min:1',
            'order' => 'required|in:0,1',
            'page' => 'integer|min:1',
            'size' => 'required|integer|min:1',
        ]);
    }

    public function postDetail($id)
    {
        //点击量加1
        $post = Post::find($id);
        $post->click_number += 1;
        $post->save();

        View::addExtension('html', 'php');

        return view('dist.forumdetail');
    }

    public function getPostDetailData($id)
    {
        try {
            $post = Post::where('id', $id)
                ->where('disabled', 0)
                ->first();

            if (empty($post)) {
                throw new \Exception('未找到该帖子！');
            }

            //判断是否登陆
            if ($user = Auth::user()) {
                $data['has_login'] = 1;

                //注册时间大于CAN_COMMENT_AFTER_REGISTRATION值时，可以评论
                $userCreateAt = $user->created_at;

                if ((time() - strtotime($userCreateAt)) >= Config::get('constants.CAN_COMMENT_AFTER_REGISTRATION')) {
                    $data['can_comment'] = 1;
                } else {
                    $data['can_comment'] = 0;
                }

                //查看是否加油过
                $cheeredUsers = $post->cheered_users;

                if (false !== strpos(','.$user->id.',', $cheeredUsers)) {
                    $data['has_cheered'] = 1;
                } else {
                    $data['has_cheered'] = 0;
                }
            } else {
                $data['has_login'] = 0;
            }

            $labels = indexDbSourcesWithPrimarykey(DB::table('ft2_labels')->get());

            $postUser = User::find($post->user_id);

            $data['post'] = [
                'avatar' => $postUser->avatar,
                'nickname' => $postUser->nickname,
                'user_labels' => $this->getUserLabels($postUser),
                'title' => $post->title,
                'labels' => arrayValuesWithIndex($labels, explode(',', $post->labels) ,'name'),
                'release_time' => (string)$post->created_at,
                'content' => $post->content,
                'images' => json_decode($post->images, true),
                'cheer_number' => $post->cheer_number,
                'comment_number' => $post->comment_number
            ];

            //评论
            $comments = DB::table('ft2_post_comments')
                ->where('ft2_post_comments.post_id', $id)
                ->where('ft2_post_comments.disabled', 0)
                ->join('ft2_users', 'ft2_post_comments.user_id', '=', 'ft2_users.id')
                ->orderBy('ft2_post_comments.created_at', 'desc')
                ->select('ft2_post_comments.id as comment_id', 'ft2_post_comments.content', 'ft2_post_comments.created_at', 'ft2_users.nickname', 'ft2_users.avatar')
                ->get();

            //回复
            $responses = DB::table('ft2_post_comment_responses')
                ->where('ft2_post_comment_responses.post_comment_response_id', 0)
                ->where('ft2_post_comment_responses.post_id', $id)
                ->where('ft2_post_comment_responses.disabled', 0)
                ->join('ft2_users', 'ft2_post_comment_responses.user_id', '=', 'ft2_users.id')
                ->join('ft2_post_comments', 'ft2_post_comment_responses.post_comment_id', '=', 'ft2_post_comments.id')
                ->join('ft2_users as ft2_users_2', 'ft2_post_comments.user_id', '=', 'ft2_users_2.id')
                ->orderBy('ft2_post_comment_responses.created_at', 'desc')
                ->select('ft2_post_comment_responses.id as comment_response_id', 'ft2_post_comment_responses.content',
                    'ft2_post_comment_responses.created_at', 'ft2_users.nickname', 'ft2_users.avatar',
                    'ft2_users_2.nickname as response_nickname')
                ->get();

            //回复某人的回复
            $responsesOfResponses = DB::table('ft2_post_comment_responses')
                ->where('ft2_post_comment_responses.post_comment_response_id', '<>', 0)
                ->where('ft2_post_comment_responses.post_id', $id)
                ->where('ft2_post_comment_responses.disabled', 0)
                ->join('ft2_users', 'ft2_post_comment_responses.user_id', '=', 'ft2_users.id')
                ->join('ft2_post_comment_responses as ft2_post_comment_responses_2', 'ft2_post_comment_responses.post_comment_response_id', '=', 'ft2_post_comment_responses_2.id')
                ->join('ft2_users as ft2_users_2', 'ft2_post_comment_responses_2.user_id', '=', 'ft2_users_2.id')
                ->orderBy('ft2_post_comment_responses.created_at', 'desc')
                ->select('ft2_post_comment_responses.id as comment_response_id', 'ft2_post_comment_responses.content',
                    'ft2_post_comment_responses.created_at', 'ft2_users.nickname', 'ft2_users.avatar',
                    'ft2_users_2.nickname as response_nickname')
                ->get();

            $responses = array_merge($comments->all(), $responses->all(), $responsesOfResponses->all());

            foreach ($responses as $key => $row){
                $createdAt[$key] = $row->created_at;
            }

            if (! empty($responses)) {
                array_multisort($createdAt, SORT_DESC, $responses);
            }

            $data['post']['comments'] = $responses;

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function cheerPost($id)
    {
        try {
            $post = Post::where('id', $id)
                ->where('disabled', 0)
                ->first();

            if (empty($post)) {
                throw new \Exception('未找到该帖子！');
            }

            $user = Auth::user();

            $cheeredUsers = $post->cheered_users;

            if ($cheeredUsers !== null) {
                $cheeredUsers .= $user->id.',';
            } else {
                $cheeredUsers = ','.$user->id.',';
            }

            $post->cheer_number += 1;  //加油数量加1
            $post->cheered_users = $cheeredUsers;
            $post->save();

            return response()->success([]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function addPostComment(Request $request)
    {
        try {
            //验证参数
            $this->validateAddPostComment($request);

            $id = $request->id;
            $commentId = $request->comment_id;
            $commentResponseId = $request->comment_response_id;
            $content = $request->input('content');

            $post = Post::find($id);

            $user = Auth::user();

            if ($commentId == null && $commentResponseId == null) {  //评论
                $newComment = new PostComment();
                $newComment->post_id = $post->id;
                $newComment->user_id = $user->id;
                $newComment->content = $content;
                $newComment->save();

                $data['comment_id'] = $newComment->id;
            } elseif ($commentId != null) {
                $newResponse = new PostCommentResponse();
                $newResponse->post_id = $post->id;
                $newResponse->post_comment_id = $commentId;
                $newResponse->user_id = $user->id;
                $newResponse->content = $content;
                $newResponse->save();

                $data['comment_response_id'] = $newResponse->id;

                //评论的回复数量加1
                $comment = PostComment::find($commentId);
                $comment->response_number += 1;
                $comment->save();
            } elseif ($commentResponseId != null) {
                $response = PostCommentResponse::find($commentResponseId);

                $newResponse = new PostCommentResponse();
                $newResponse->post_id = $post->id;
                $newResponse->post_comment_id = $response->post_comment_id;
                $newResponse->post_comment_response_id = $commentResponseId;
                $newResponse->user_id = $user->id;
                $newResponse->content = $content;
                $newResponse->save();

                $data['comment_response_id'] = $newResponse->id;

                //评论的回复数量加1
                $comment = PostComment::find($response->post_comment_id);
                $comment->response_number += 1;
                $comment->save();
            } else {
                throw new \Exception(Config::get('constants.PARAM_ERROR_MESSAGE'));
            }

            //增加帖子评论数量
            $post->comment_number += 1;
            $post->last_response = Date('Y-m-d H:i:s');
            $post->save();

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateAddPostComment(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:ft2_posts,id,disabled,0',
            'content' => 'required',
        ]);
    }

    public function addPost(Request $request)
    {
        try {
            //验证参数
            $this->validateAddPost($request);

            $forum_sub_section_id = $request->forum_sub_section_id;
            $title = $request->title;
            $labels = $request->labels;
            $content = $request->input('content');
            $images = $request->images;

            $subSection = DB::table('ft2_forum_sub_sections')
                ->where('id', $forum_sub_section_id)
                ->first();

            $user = Auth::user();

            $post = new Post();
            $post->forum_section_id = $subSection->forum_section_id;
            $post->forum_sub_section_id = $forum_sub_section_id;
            $post->user_id = $user->id;
            $post->title = $title;

            if (! empty($labels)) {
                $post->labels = implode(',', $labels);
            }

            $post->content = $content;

            if (! empty($images)) {
                $post->images = json_encode($images);
            }

            $post->save();

            return response()->success([]);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateAddPost($request)
    {
        $this->validate($request, [
            'forum_sub_section_id' => 'required|exists:ft2_forum_sub_sections,id',
            'title' => 'required|max:255',
            'labels' => 'array',
            'content' => 'required',
            'images' => 'array',
        ]);
    }
}
