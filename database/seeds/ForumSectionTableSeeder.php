<?php

use Illuminate\Database\Seeder;

class ForumSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_forum_sections')->insert([[
            'id' => 1,
            'name' => '新希望',
            'sort' => 0
        ],[
            'id' => 2,
            'name' => '病情交流',
            'sort' => 1
        ],[
            'id' => 3,
            'name' => '病友互助',
            'sort' => 2
        ]]);
    }
}
