<?php

use Illuminate\Database\Seeder;

class PathologicTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_pathologic_types')->insert([[
            'id' => 1,
            'name' => '小细胞肺癌'
        ],[
            'id' => 2,
            'name' => '肺鳞癌'
        ],[
            'id' => 3,
            'name' => '肺腺癌'
        ],[
            'id' => 4,
            'name' => '肺鳞癌'
        ],[
            'id' => 5,
            'name' => '混合癌'
        ]]);
    }
}
