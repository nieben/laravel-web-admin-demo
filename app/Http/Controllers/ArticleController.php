<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleComment;
use App\ArticleCommentResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
    public function detail($id)
    {
        //点击量加1
        $article = Article::find($id);
        $article->click_number += 1;
        $article->save();

        View::addExtension('html', 'php');

        return view('dist.articledetail');
    }

    public function getDetailData($id)
    {
        try {
            $article = Article::where('id', $id)
                ->where('status', 1)
                ->where('disabled', 0)
                ->first();

            if (empty($article)) {
                throw new \Exception('未找到该文章！');
            }

            //判断是否登陆
            if ($user = Auth::user()) {
                $data['has_login'] = 1;

                $data['nickname'] = $user->nickname;

                $data['avatar'] = $user->avatar;

                //注册时间大于CAN_COMMENT_AFTER_REGISTRATION值时，可以评论
                $userCreateAt = $user->created_at;

                if ((time() - strtotime($userCreateAt)) >= Config::get('constants.CAN_COMMENT_AFTER_REGISTRATION')) {
                    $data['can_comment'] = 1;
                } else {
                    $data['can_comment'] = 0;
                }

                //查看是否加油过
                $cheeredUsers = $article->cheered_users;

                if (false !== strpos(','.$user->id.',', $cheeredUsers)) {
                    $data['has_cheered'] = 1;
                } else {
                    $data['has_cheered'] = 0;
                }
            } else {
                $data['has_login'] = 0;
            }

            $labels = indexDbSourcesWithPrimarykey(DB::table('ft2_labels')->get());

            $data['article'] = [
                'title' => $article->title,
                'labels' => arrayValuesWithIndex($labels, explode(',', $article->labels) ,'name'),
                'release_time' => date('Y-m-d', strtotime($article->release_time)),  //Y-m-d格式，只精确到天
                'content' => $article->content,
                'cheer_number' => $article->cheer_number,
                'allow_comment' => $article->allow_comment
            ];

            if ($article->allow_comment == 1) {
                $data['article']['comment_number'] = $article->comment_number;

                //评论
                $comments = DB::table('ft2_article_comments')
                    ->where('ft2_article_comments.article_id', $id)
                    ->where('ft2_article_comments.disabled', 0)
                    ->join('ft2_users', 'ft2_article_comments.user_id', '=', 'ft2_users.id')
                    ->orderBy('ft2_article_comments.created_at', 'desc')
                    ->select('ft2_article_comments.id as comment_id', 'ft2_article_comments.content', 'ft2_article_comments.created_at', 'ft2_users.nickname', 'ft2_users.avatar')
                    ->get();

                //回复
                $responses = DB::table('ft2_article_comment_responses')
                    ->where('ft2_article_comment_responses.article_comment_response_id', 0)
                    ->where('ft2_article_comment_responses.article_id', $id)
                    ->where('ft2_article_comment_responses.disabled', 0)
                    ->join('ft2_users', 'ft2_article_comment_responses.user_id', '=', 'ft2_users.id')
                    ->join('ft2_article_comments', 'ft2_article_comment_responses.article_comment_id', '=', 'ft2_article_comments.id')
                    ->join('ft2_users as ft2_users_2', 'ft2_article_comments.user_id', '=', 'ft2_users_2.id')
                    ->orderBy('ft2_article_comment_responses.created_at', 'desc')
                    ->select('ft2_article_comment_responses.id as comment_response_id', 'ft2_article_comment_responses.content',
                        'ft2_article_comment_responses.created_at', 'ft2_users.nickname', 'ft2_users.avatar',
                        'ft2_users_2.nickname as response_nickname')
                    ->get();

                //回复某人的回复
                $responsesOfResponses = DB::table('ft2_article_comment_responses')
                    ->where('ft2_article_comment_responses.article_comment_response_id', '<>', 0)
                    ->where('ft2_article_comment_responses.article_id', $id)
                    ->where('ft2_article_comment_responses.disabled', 0)
                    ->join('ft2_users', 'ft2_article_comment_responses.user_id', '=', 'ft2_users.id')
                    ->join('ft2_article_comment_responses as ft2_article_comment_responses_2', 'ft2_article_comment_responses.article_comment_response_id', '=', 'ft2_article_comment_responses_2.id')
                    ->join('ft2_users as ft2_users_2', 'ft2_article_comment_responses_2.user_id', '=', 'ft2_users_2.id')
                    ->orderBy('ft2_article_comment_responses.created_at', 'desc')
                    ->select('ft2_article_comment_responses.id as comment_response_id', 'ft2_article_comment_responses.content',
                        'ft2_article_comment_responses.created_at', 'ft2_users.nickname', 'ft2_users.avatar',
                        'ft2_users_2.nickname as response_nickname')
                    ->get();

                $responses = array_merge($comments->all(), $responses->all(), $responsesOfResponses->all());

                foreach ($responses as $key => $row){
                    $createdAt[$key] = $row->created_at;

                    if (property_exists($row, 'comment_id')) {
                        $responses[$key]->comment_response_id = '';
                    } else {
                        $responses[$key]->comment_id = '';
                    }
                }

                if (! empty($createdAt)) {
                    array_multisort($createdAt, SORT_DESC, $responses);
                }
                
                $data['article']['comments'] = $responses;
            }

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function cheer($id)
    {
        try {
            $article = Article::where('id', $id)
                ->where('status', 1)
                ->where('disabled', 0)
                ->first();

            if (empty($article)) {
                throw new \Exception('未找到该文章！');
            }

            $user = Auth::user();

            $cheeredUsers = $article->cheered_users;

            if ($cheeredUsers !== null) {
                $cheeredUsers .= $user->id.',';
            } else {
                $cheeredUsers = ','.$user->id.',';
            }

            $article->cheer_number += 1;  //加油数量加1
            $article->cheered_users = $cheeredUsers;
            $article->save();

            return response()->success([], '成功！');
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function uncheer($id)
    {
        try {
            $article = Article::where('id', $id)
                ->where('status', 1)
                ->where('disabled', 0)
                ->first();

            if (empty($article)) {
                throw new \Exception('未找到该文章！');
            }

            $user = Auth::user();

            $cheeredUsers = $article->cheered_users;

            if ($cheeredUsers !== null) {
                $cheeredUsers = str_replace(','.$user->id.',', ',', $cheeredUsers);
            }

            $article->cheer_number -= 1;  //加油数量减1
            $article->cheered_users = $cheeredUsers;
            $article->save();

            return response()->success([], '取消成功！');
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function addComment(Request $request)
    {
        try {
            //验证参数
            $this->validateAddComment($request);

            $id = $request->id;
            $commentId = $request->comment_id;
            $commentResponseId = $request->comment_response_id;
            $content = $request->input('content');

            $article = Article::find($id);

            $user = Auth::user();

            if ($commentId == null && $commentResponseId == null) {  //评论
                $newComment = new ArticleComment();
                $newComment->article_id = $article->id;
                $newComment->user_id = $user->id;
                $newComment->content = $content;
                $newComment->save();

                $data['comment_id'] = $newComment->id;
            } elseif ($commentId != null) {
                $newResponse = new ArticleCommentResponse();
                $newResponse->article_id = $article->id;
                $newResponse->article_comment_id = $commentId;
                $newResponse->user_id = $user->id;
                $newResponse->content = $content;
                $newResponse->save();

                $data['comment_response_id'] = $newResponse->id;
                
                //评论的回复数量加1
                $comment = ArticleComment::find($commentId);
                $comment->response_number += 1;
                $comment->save();
            } elseif ($commentResponseId != null) {
                $response = ArticleCommentResponse::find($commentResponseId);

                $newResponse = new ArticleCommentResponse();
                $newResponse->article_id = $article->id;
                $newResponse->article_comment_id = $response->article_comment_id;
                $newResponse->article_comment_response_id = $commentResponseId;
                $newResponse->user_id = $user->id;
                $newResponse->content = $content;
                $newResponse->save();

                $data['comment_response_id'] = $newResponse->id;

                //评论的回复数量加1
                $comment = ArticleComment::find($response->article_comment_id);
                $comment->response_number += 1;
                $comment->save();
            } else {
                throw new \Exception(Config::get('constants.PARAM_ERROR_MESSAGE'));
            }

            //增加文章评论数量
            $article->comment_number += 1;
            $article->last_response = Date('Y-m-d H:i:s');
            $article->save();

            return response()->success($data, '评论成功！');
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateAddComment(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:ft2_articles,id,status,1,disabled,0',
            'content' => 'required',
        ]);
    }
}
