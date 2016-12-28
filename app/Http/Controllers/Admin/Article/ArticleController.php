<?php

namespace App\Http\Controllers\Admin\Article;

use App\Article;
use App\ArticleComment;
use App\ArticleCommentResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * 文章列表页
     */
    public function index(Request $request)
    {
        $category_id = $request->input('category_id');
        $title = $request->input('title');

        $searchParams = [];
        $db = DB::table('ft2_articles');

        if ($category_id != '') {
            $db->where('ft2_articles.article_category_id', $category_id);
            $searchParams['category_id'] = $category_id;
        }
        if ($title != '') {
            $db->where('ft2_articles.title', 'like', '%'.$title.'%');
            $searchParams['title'] = $title;
        }
        $data['searchParams'] = $searchParams;

        $labels = DB::table('ft2_labels')->get();

        $articles = $db->where('ft2_articles.disabled', '=', 0)
            ->join('ft2_article_categories', 'ft2_article_categories.id', '=', 'ft2_articles.article_category_id')
            ->orderBy('ft2_articles.created_at', 'desc')
            ->select('ft2_articles.*', 'ft2_article_categories.name as category_name')
            ->paginate(10);
        $data['articles'] = $this->generateArticles($articles, indexDbSourcesWithPrimarykey($labels));

        $data['article_categories'] = DB::table('ft2_article_categories')->get();
        $data['active'] = 'article';

        return view('admin.article.list', $data);
    }

    protected function generateArticles($articles, $labels)
    {
        foreach ($articles as $key => $row) {
            $labelNames = arrayValuesWithIndex($labels, explode(',', $row->labels) ,'name');
            $articles[$key]->labels_zh = implode(', ', $labelNames);
        }

        return $articles;
    }

    public function add()
    {
        $data['labels'] = DB::table('ft2_labels')
            ->where('disabled', 0)
            ->get();

        $data['article_categories'] = DB::table('ft2_article_categories')->get();

        $data['active'] = 'article';

        return view('admin.article.add', $data);
    }

    public function addSubmit(Request $request)
    {
        try {
            $article = new Article();
            $article->title = $request->input('title');
            $article->title_image = $request->input('title_image');
            $article->article_category_id = $request->input('article_category_id');
            $article->labels = implode(',', (array)$request->input('label'));
            $article->content = $request->input('content');
            $article->status = $request->input('status');
            $article->allow_comment = $request->input('allow_comment');
            $article->display_comment = 1;
            $article->save();

            return array(
                'error' => 0,
                'message' => '添加成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }

    public function edit($id)
    {
        $data['labels'] = DB::table('ft2_labels')
            ->where('disabled', 0)
            ->get();

        $data['article_categories'] = DB::table('ft2_article_categories')->get();

        $data['active'] = 'article';

        $article = Article::where('id', $id)->first();
        if (empty($article)) {
            redirect('/admin/article/list');
        }
        $labelNames = arrayValuesWithIndex($data['labels'], explode(',', $article->labels) ,'name');
        $article->labels_zh = implode(',', $labelNames);
        $article->labels_arr = explode(',', $article->labels);
        $data['article'] = $article;

        //评论
        $comments = DB::table('ft2_article_comments')
            ->where('ft2_article_comments.article_id', $id)
            ->where('ft2_article_comments.disabled', 0)
            ->join('ft2_users', 'ft2_article_comments.user_id', '=', 'ft2_users.id')
            ->orderBy('ft2_article_comments.created_at', 'desc')
            ->select('ft2_article_comments.id as comment_id', 'ft2_article_comments.content', 'ft2_article_comments.created_at', 'ft2_users.mobile', 'ft2_users.nickname', 'ft2_users.avatar')
            ->get();

        //回复
        $responses = DB::table('ft2_article_comment_responses')
            ->where('ft2_article_comment_responses.article_id', $id)
            ->where('ft2_article_comment_responses.disabled', 0)
            ->join('ft2_users', 'ft2_article_comment_responses.user_id', '=', 'ft2_users.id')
            ->orderBy('ft2_article_comment_responses.created_at', 'desc')
            ->select('ft2_article_comment_responses.id as response_id', 'ft2_article_comment_responses.content', 'ft2_article_comment_responses.created_at', 'ft2_users.mobile', 'ft2_users.nickname', 'ft2_users.avatar')
            ->get();

        $responses = array_merge($comments->all(), $responses->all());

        foreach ($responses as $key => $row){
            $createdAt[$key] = $row->created_at;
        }

        array_multisort($createdAt, SORT_DESC, $responses);

        $data['responses'] = $responses;

        $data['default_avatar'] = Config::get('constants.DEFAULT_AVATAR');

        return view('admin.article.edit', $data);
    }

    public function editSubmit(Request $request)
    {
        try {
            $article = Article::find($request->input('id'));
            $article->title = $request->input('title');
            $article->title_image = $request->input('title_image');
            $article->article_category_id = $request->input('article_category_id');
            $article->labels = implode(',', (array)$request->input('label'));
            $article->content = $request->input('content');
            $article->status = $request->input('status');
            $article->allow_comment = $request->input('allow_comment');
            $article->display_comment = 1;
            $article->save();

            return array(
                'error' => 0,
                'message' => '修改成功！'
            );
        }catch (\Exception $e) {
            return array(
                'error' => 1,
                'message' => $e->getMessage()
            );
        }
    }

    public function disable($id)
    {
        try {
            $article = Article::find($id);
            if (empty($article)) {
                throw new \Exception('未找到该订单！');
            }
            $article->disabled = 1;
            $article->save();

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
                $articleComment = ArticleComment::find($id);

                if (empty($articleComment)) {
                    throw new \Exception('未找到该评论！');
                }

                $articleComment->disabled = 1;
                $articleComment->save();
            } elseif ($type == 'response') {
                $articleCommentResponse = ArticleCommentResponse::find($id);

                if (empty($articleCommentResponse)) {
                    throw new \Exception('未找到该评论！');
                }

                $articleCommentResponse->disabled = 1;
                $articleCommentResponse->save();
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
