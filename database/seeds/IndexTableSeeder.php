<?php

use Illuminate\Database\Seeder;

class IndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ft2_indexes')->insert([[
            'id' => 1,
            'type' => 'tumor',
            'important' => 1,
            'name' => '癌胚抗原',
            'alias' => 'CEA'
        ],[
            'id' => 2,
            'type' => 'tumor',
            'important' => 0,
            'name' => '糖类抗原19-9',
            'alias' => 'CA19-9'
        ],[
            'id' => 3,
            'type' => 'tumor',
            'important' => 0,
            'name' => '非小细胞肺癌相关抗原',
            'alias' => 'CA21-1'
        ],[
            'id' => 4,
            'type' => 'tumor',
            'important' => 0,
            'name' => '糖类抗原72-4',
            'alias' => 'CA72-4'
        ],[
            'id' => 5,
            'type' => 'tumor',
            'important' => 0,
            'name' => '糖类抗原50',
            'alias' => 'CA-50'
        ],[
            'id' => 6,
            'type' => 'tumor',
            'important' => 0,
            'name' => '糖类抗原12-5',
            'alias' => 'CA12-5'
        ],[
            'id' => 7,
            'type' => 'tumor',
            'important' => 0,
            'name' => '神经角质烯醇化酶',
            'alias' => 'NSE'
        ],[
            'id' => 8,
            'type' => 'tumor',
            'important' => 0,
            'name' => '细胞角蛋白19片段',
            'alias' => 'CYFRA21-1'
        ],[
            'id' => 9,
            'type' => 'tumor',
            'important' => 0,
            'name' => '鳞状细胞癌相关抗原',
            'alias' => 'SCC-AG'
        ],[
            'id' => 10,
            'type' => 'tumor',
            'important' => 0,
            'name' => '肿瘤大小 (最大直径)',
            'alias' => 'TUMOR SIZE'
        ],[
            'id' => 11,
            'type' => 'liver',
            'important' => 1,
            'name' => '总胆红素',
            'alias' => 'TBIL'
        ],[
            'id' => 12,
            'type' => 'liver',
            'important' => 1,
            'name' => '直接胆红素',
            'alias' => 'DBIL'
        ],[
            'id' => 13,
            'type' => 'liver',
            'important' => 1,
            'name' => '间接胆红素',
            'alias' => 'IBIL'
        ],[
            'id' => 14,
            'type' => 'liver',
            'important' => 1,
            'name' => '总蛋白',
            'alias' => 'TP'
        ],[
            'id' => 15,
            'type' => 'liver',
            'important' => 1,
            'name' => '白蛋白',
            'alias' => 'ALB'
        ],[
            'id' => 16,
            'type' => 'liver',
            'important' => 1,
            'name' => '谷丙转氨酶',
            'alias' => 'ALT'
        ],[
            'id' => 17,
            'type' => 'liver',
            'important' => 1,
            'name' => '谷草转氨酶',
            'alias' => 'AST'
        ],[
            'id' => 18,
            'type' => 'liver',
            'important' => 1,
            'name' => '碱性磷酸酶',
            'alias' => 'ALP'
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ],[
            'id' => 1,
            'type' => '',
            'important' => 0,
            'name' => '',
            'alias' => ''
        ]]);
    }
}
