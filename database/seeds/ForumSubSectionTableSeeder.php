<?php

use Illuminate\Database\Seeder;

class ForumSubSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_forum_sub_sections')->insert([[
            'forum_section_id' => 1,
            'name' => '免费临床',
            'logo_image' => '',
            'sort' => 0
        ],[
            'forum_section_id' => 1,
            'name' => '前沿信息',
            'logo_image' => '',
            'sort' => 1
        ],[
            'forum_section_id' => 1,
            'name' => '英雄案例',
            'logo_image' => '',
            'sort' => 2
        ],[
            'forum_section_id' => 2,
            'name' => '鳞',
            'logo_image' => '',
            'sort' => 0
        ],[
            'forum_section_id' => 2,
            'name' => '腺',
            'logo_image' => '',
            'sort' => 1
        ],[
            'forum_section_id' => 2,
            'name' => '混合',
            'logo_image' => '',
            'sort' => 2
        ],[
            'forum_section_id' => 2,
            'name' => '小细胞',
            'logo_image' => '',
            'sort' => 3
        ],[
            'forum_section_id' => 2,
            'name' => '大细胞',
            'logo_image' => '',
            'sort' => 4
        ],[
            'forum_section_id' => 2,
            'name' => '未确诊类型',
            'logo_image' => '',
            'sort' => 5
        ],[
            'forum_section_id' => 3,
            'name' => '同城交流',
            'logo_image' => '',
            'sort' => 0
        ],]);
    }
}
