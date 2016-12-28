<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_users')->insert([[
            'mobile' => '18811742071',
            'password' => bcrypt('123'),
            'nickname' => 'ben'
        ],[
            'mobile' => '13998202612',
            'password' => bcrypt('123'),
            'nickname' => 'xu'
        ]]);
    }
}
