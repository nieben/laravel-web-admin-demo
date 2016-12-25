<?php

use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_admin_users')->insert([[
            'email' => 'info@haalthy.com',
            'password' => bcrypt('haalthy.comA'),
        ]]);
    }
}
