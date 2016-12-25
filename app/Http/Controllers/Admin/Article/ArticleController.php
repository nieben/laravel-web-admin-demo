<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $db->where('article_category_id', $category_id);
            $searchParams['category_id'] = $category_id;
        }
        if ($title != '') {
            $db->where('title', 'like', '%'.$title.'%');
            $searchParams['title'] = $title;
        }

        $labels = DB::table('ft2_labels')->get();

        $articles = $db->where('ft2_articles.disabled', '=', 0)
            ->join('ft2_article_categories', 'ft2_article_categories.id', '=', 'ft2_articles.article_category_id')
            ->orderBy('ft2_articles.created_at', 'desc')
            ->select('ft2_articles.*', 'ft2_article_categories.name as category_name')
            ->paginate(10);
        $data['articles'] = $this->generateArticles($articles, indexDbSourcesWithPrimarykey($labels));

        $data['article_categories'] = DB::table('ft2_article_categories')->get();

        return view('admin.article.list',$data);
    }

    protected function generateArticles($articles, $labels)
    {
        $articlesGenerated = [];

        foreach ($articles as $key => $row) {
            $articleGenerated = $row;
            $labelNames = arrayValuesWithIndex($labels, explode(',', $row->lables) ,'name');
            $articleGenerated['labels_zh'] = implode(',', $labelNames);

            $articlesGenerated[] = $articleGenerated;
        }

        return $articlesGenerated;
    }
}
