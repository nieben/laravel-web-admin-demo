<?php

use Illuminate\Database\Seeder;

class LabelCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_label_categories')->insert([[
            'name' => '检测手段'
        ],[
            'name' => '基因检测'
        ],[
            'name' => '化疗'
        ],[
            'name' => '靶向'
        ],[
            'name' => '病理'
        ],[
            'name' => '其他'
        ]]);
    }
}
