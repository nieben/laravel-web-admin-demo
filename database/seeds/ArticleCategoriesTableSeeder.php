<?php

use Illuminate\Database\Seeder;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_article_categories')->insert([[
            'name' => '科普'
        ],[
            'name' => '深度'
        ],[
            'name' => '活动'
        ]]);
    }
}
