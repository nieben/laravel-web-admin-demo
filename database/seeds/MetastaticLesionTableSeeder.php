<?php

use Illuminate\Database\Seeder;

class MetastaticLesionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_metastatic_lesions')->insert([[
            'id' => 1,
            'name' => '脑部'
        ],[
            'id' => 2,
            'name' => '肝肾'
        ],[
            'id' => 3,
            'name' => '淋巴'
        ],[
            'id' => 4,
            'name' => '胸膜'
        ],[
            'id' => 5,
            'name' => '骨转移'
        ]]);
    }
}
