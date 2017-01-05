<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Article;
use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $banners = DB::table('ft2_banners')
            ->where('ft2_banners.position', 'home_top')
            ->join('ft2_articles', 'ft2_articles.id', '=', 'ft2_banners.article_id')
            ->orderBy('ft2_banners.sort', 'asc')
            ->select('ft2_banners.*', 'ft2_articles.title as article_title', 'ft2_articles.labels')
            ->get();

        $labels = DB::table('ft2_labels')->get();

        $data['banners'] = $this->generateBanners($banners, $labels);

        $data['active'] = 'article';

        return view('admin.banner.list', $data);
    }

    protected function generateBanners($banners, $labels)
    {
        foreach ($banners as $key => $row) {
            $labelNames = arrayValuesWithIndex($labels, explode(',', $row->labels) ,'name');
            $banners[$key]->labels_zh = implode(',', $labelNames);
        }

        return $banners;
    }

    public function add()
    {
        $data['active'] = 'article';

        return view('admin.banner.add', $data);
    }

    public function addSubmit(Request $request)
    {
        try {
            //检查article_id
            $article_id = $request->input('article_id');
            if (empty(Article::find($article_id))) {
                throw new \Exception('文章编号不存在！');
            }

            $banner = new Banner();
            $banner->position = 'home_top';
            $banner->article_id = $article_id;
            $banner->title = $request->input('title');
            $banner->image = $request->input('image');
            $banner->disabled = $request->input('disabled');
            $banner->sort = $request->input('sort');
            $banner->save();

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
        $banner = Banner::find($id);
        if (empty($banner)) {
            return redirect('/admin/banner/list');
        }
        $data['banner'] = $banner;

        $data['active'] = 'article';

        return view('admin.banner.edit', $data);
    }

    public function editSubmit(Request $request)
    {
        try {
            //检查article_id
            $article_id = $request->input('article_id');
            if (empty(Article::find($article_id))) {
                throw new \Exception('文章编号不存在！');
            }

            $banner = Banner::find($request->input('id'));
            $banner->article_id = $article_id;
            $banner->title = $request->input('title');
            $banner->image = $request->input('image');
            $banner->disabled = $request->input('disabled');
            $banner->sort = $request->input('sort');
            $banner->save();

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
}
