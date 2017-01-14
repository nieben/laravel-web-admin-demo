<?php

use Illuminate\Database\Seeder;

class GenicMutationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_genic_mutations')->insert([[
            'id' => 1,
            'name' => 'EGFR',
            'sub_names' => json_encode(["EGFR18", "EGFR19", "EGFR20", "EGFR21"])
        ],[
            'id' => 2,
            'name' => 'ALK',
            'sub_names' => json_encode([])
        ],[
            'id' => 3,
            'name' => 'ROS1',
            'sub_names' => json_encode([])
        ],[
            'id' => 4,
            'name' => 'HER2',
            'sub_names' => json_encode([])
        ],[
            'id' => 5,
            'name' => 'BRAF',
            'sub_names' => json_encode([])
        ],[
            'id' => 6,
            'name' => 'Kras',
            'sub_names' => json_encode([])
        ],[
            'id' => 7,
            'name' => 'RET',
            'sub_names' => json_encode([])
        ],[
            'id' => 8,
            'name' => 'ERCC1/RRM1',
            'sub_names' => json_encode([])
        ],[
            'id' => 9,
            'name' => 'cMET',
            'sub_names' => json_encode([])
        ],[
            'id' => 10,
            'name' => 'T790M',
            'sub_names' => json_encode([])
        ]]);
    }
}
