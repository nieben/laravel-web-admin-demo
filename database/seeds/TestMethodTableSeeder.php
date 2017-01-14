<?php

use Illuminate\Database\Seeder;

class TestMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_test_methods')->insert([[
            'id' => 1,
            'name' => '组织标本(活检)'
        ],[
            'id' => 2,
            'name' => '血液标本'
        ],[
            'id' => 3,
            'name' => '胸水蜡块'
        ]]);
    }
}
