<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',['active' => 'home']);
    }

    public function getIndexData(Request $request)
    {
        try {
            //验证参数
            $this->validateGetIndexData($request);

            $article_category_id = $request->input('article_category_id');
            $size = $request->input('size');

            //判断是否登陆
            if (Auth::user()) {
                $data['has_login'] = 1;
            } else {
                $data['has_login'] = 0;
            }

            //获取首页banner
            $labels = indexDbSourcesWithPrimarykey(DB::table('ft2_labels')->get());

            $banners = Banner::where('ft2_banners.position', 'home_top')
                ->where('ft2_banners.disabled', 0)
                ->join('ft2_articles', 'ft2_articles.id', '=', 'ft2_banners.article_id')
                ->orderBy('ft2_banners.sort', 'asc')
                ->orderBy('ft2_banners.created_at', 'desc')
                ->select('ft2_banners.*', 'ft2_articles.labels')
                ->get();

            $data['banners'] = $this->generateBanners($banners, $labels);

            //获取文章列表
            $articles = Article::where('ft2_articles.disabled', '=', 0)
                ->where('ft2_articles.status', '=', 1)
                ->where('ft2_articles.article_category_id', '=', $article_category_id)
                ->orderBy('ft2_articles.created_at', 'desc')
                ->paginate($size);

            $data['articles'] = $this->generateArticles($articles, $labels);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function generateBanners($banners, $labels)
    {
        $bannersGenerated = [];

        foreach ($banners as $key => $row) {
            $bannersGenerated[] = [
                'title' => $row->title,
                'image' => $row->image,
                'labels' => arrayValuesWithIndex($labels, explode(',', $row->labels) ,'name'),
                'url' => '/article/detail/'.$row->article_id
            ];
        }

        return $bannersGenerated;
    }

    protected function generateArticles($articles, $labels)
    {
        $articlesGenerated = [];

        foreach ($articles as $key => $row) {
            $articlesGenerated[] = [
                'id' => $row->id,
                'title' => $row->title,
                'title_image' => $row->title_image,
                'labels' => arrayValuesWithIndex($labels, explode(',', $row->labels) ,'name'),
                'release_time' => $row->release_time
            ];
        }

        return $articlesGenerated;
    }

    protected function validateGetIndexData(Request $request)
    {
        $this->validate($request, [
            'article_category_id' => 'required|integer|min:1',
            'page' => 'required|integer|min:1',
            'size' => 'required|integer|min:1',
        ]);
    }

    public function searchArticles(Request $request)
    {
        try {
            //验证参数
            $this->validateSearchArticles($request);

            $article_category_id = $request->input('article_category_id');
            $size = $request->input('size');

            //获取文章列表
            $articles = Article::where('ft2_articles.disabled', '=', 0)
                ->where('ft2_articles.status', '=', 1)
                ->where('ft2_articles.article_category_id', '=', $article_category_id)
                ->orderBy('ft2_articles.created_at', 'desc')
                ->paginate($size);

            $labels = indexDbSourcesWithPrimarykey(DB::table('ft2_labels')->get());

            $data['articles'] = $this->generateArticles($articles, $labels);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateSearchArticles(Request $request)
    {
        $this->validate($request, [
            'article_category_id' => 'required|integer|min:1',
            'page' => 'required|integer|min:1',
            'size' => 'required|integer|min:1',
        ]);
    }

    public function test(Request $request)
    {
        $user = User::find(1);

        return response()->success([
            'test' => json_decode($user->metastatic_lesion, true),
            'test2' => $user->metastatic_lesion
        ]);
    }
}
