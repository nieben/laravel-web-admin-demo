<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function getIndexData()
    {
        try {
            //判断是否登陆
            if (Auth::user()) {
                $data['has_login'] = 1;
            } else {
                $data['has_login'] = 0;
            }

            //获取版块信息
            $sections = DB::table('ft2_forum_sections')
                ->join('ft2_forum_sub_sections', 'ft2_forum_sections.id', '=', 'ft2_forum_sub_sections.forum_section_id')
                ->where('ft2_forum_sections.disabled', 0)
                ->where('ft2_forum_sub_sections.disabled', 0)
                ->where('ft2_banners.disabled', 0)
                ->orderBy('ft2_forum_sections.sort', 'asc')
                ->orderBy('ft2_forum_sub_sections.sort', 'desc')
                ->select('ft2_forum_sections.id', 'ft2_forum_sections.name',
                    'ft2_forum_sub_sections.id as sub_id', 'ft2_forum_sub_sections.name as sub_name')
                ->get();

            $data['sections'] = $this->generateSections($sections);

            //获取帖子列表
            $articles = Post::join('ft2_users', 'ft2_posts.user_id', '=', 'ft2_users.id')
                ->where('ft2_posts.disabled', '=', 0)
                ->where('ft2_posts.forum_sub_section_id', '=', Config::get('constants.DEFAULT_DISPLAY_SECTION_ID'))
                ->orderBy('ft2_posts.created_at', 'desc')
                ->paginate(Config::get('constants.DEFAULT_POST_DISPLAY_NUMBER'));

            $data['articles'] = $this->generateArticles($articles, $labels);

            return response()->success($data);
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
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
                 'name' => $row->sub_name
             ];
         }

         //重新建立从0开始的索引
         return array_values($sectionsGenerated);
    }
}
