<?php

use Illuminate\Database\Seeder;

class DiseaseStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_disease_stages')->insert([[
            'id' => 1,
            'name' => 'I',
            'sub_names' => json_encode(["Ia", "Ib"])
        ],[
            'id' => 2,
            'name' => 'II',
            'sub_names' => json_encode(["IIa", "IIb"])
        ],[
            'id' => 3,
            'name' => 'III',
            'sub_names' => json_encode(["IIIa", "IIIb"])
        ],[
            'id' => 4,
            'name' => 'IV',
            'sub_names' => json_encode([])
        ]]);
    }
}
