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
            'id' => 19,
            'type' => 'liver',
            'important' => 0,
            'name' => '球蛋白',
            'alias' => 'GLB'
        ],[
            'id' => 20,
            'type' => 'liver',
            'important' => 0,
            'name' => '白球比例',
            'alias' => 'A/G'
        ],[
            'id' => 21,
            'type' => 'liver',
            'important' => 0,
            'name' => '谷草/谷丙',
            'alias' => 'AST/ALT'
        ],[
            'id' => 22,
            'type' => 'liver',
            'important' => 0,
            'name' => '谷氨酰转肽酶',
            'alias' => 'γGT'
        ],[
            'id' => 23,
            'type' => 'liver',
            'important' => 0,
            'name' => '脂肪酶',
            'alias' => 'FATTY ACID'
        ],[
            'id' => 24,
            'type' => 'liver',
            'important' => 0,
            'name' => '总胆汁酸',
            'alias' => 'TBA'
        ],[
            'id' => 25,
            'type' => 'liver',
            'important' => 0,
            'name' => 'a-L-岩藻糖苷酶',
            'alias' => 'AFU'
        ],[
            'id' => 26,
            'type' => 'liver',
            'important' => 0,
            'name' => '5´-核苷酸酶',
            'alias' => '5\'-NT'
        ],[
            'id' => 27,
            'type' => 'liver',
            'important' => 0,
            'name' => '胆碱酯酶',
            'alias' => 'CHE'
        ],[
            'id' => 28,
            'type' => 'liver',
            'important' => 0,
            'name' => '乳酸脱氢酶',
            'alias' => 'LDH/LD'
        ],[
            'id' => 29,
            'type' => 'liver',
            'important' => 0,
            'name' => 'a-丁酸脱氢酶',
            'alias' => 'HBDH'
        ],[
            'id' => 30,
            'type' => 'liver',
            'important' => 0,
            'name' => '甘油三酯',
            'alias' => 'TG'
        ],[
            'id' => 31,
            'type' => 'liver',
            'important' => 0,
            'name' => '血清总胆固醇',
            'alias' => 'TC'
        ],[
            'id' => 32,
            'type' => 'liver',
            'important' => 0,
            'name' => '高密度脂蛋白胆固醇',
            'alias' => 'HDL-C'
        ],[
            'id' => 33,
            'type' => 'liver',
            'important' => 0,
            'name' => '低密度脂蛋白胆固醇',
            'alias' => 'LDL-C'
        ],[
            'id' => 34,
            'type' => 'liver',
            'important' => 0,
            'name' => '载脂蛋白A1',
            'alias' => 'APOAI'
        ],[
            'id' => 35,
            'type' => 'liver',
            'important' => 0,
            'name' => '载脂蛋白B',
            'alias' => 'APOB'
        ],[
            'id' => 36,
            'type' => 'liver',
            'important' => 0,
            'name' => '前白蛋白',
            'alias' => 'PA'
        ],[
            'id' => 37,
            'type' => 'liver',
            'important' => 0,
            'name' => 'AST线粒体同工酶',
            'alias' => 'ASTM'
        ],[
            'id' => 38,
            'type' => 'liver',
            'important' => 0,
            'name' => '凝血酶原时间',
            'alias' => 'PT'
        ],[
            'id' => 39,
            'type' => 'liver',
            'important' => 0,
            'name' => '甲胎蛋白',
            'alias' => 'AFP'
        ],[
            'id' => 40,
            'type' => 'liver',
            'important' => 0,
            'name' => '自身抗体',
            'alias' => 'ANA, SMA, ANTI-LKM-1'
        ],[
            'id' => 41,
            'type' => 'renal',
            'important' => 1,
            'name' => '尿素氮',
            'alias' => 'BUN'
        ],[
            'id' => 42,
            'type' => 'renal',
            'important' => 1,
            'name' => '肌酐',
            'alias' => 'CRE'
        ],[
            'id' => 43,
            'type' => 'renal',
            'important' => 1,
            'name' => '尿酸',
            'alias' => 'URIC ACID'
        ],[
            'id' => 44,
            'type' => 'renal',
            'important' => 1,
            'name' => 'B2微球蛋白',
            'alias' => 'B2M'
        ],[
            'id' => 45,
            'type' => 'renal',
            'important' => 1,
            'name' => '胱抑素C',
            'alias' => 'CYS C'
        ],[
            'id' => 46,
            'type' => 'renal',
            'important' => 1,
            'name' => '钾',
            'alias' => 'K'
        ],[
            'id' => 47,
            'type' => 'renal',
            'important' => 1,
            'name' => '钙',
            'alias' => 'CA'
        ],[
            'id' => 48,
            'type' => 'renal',
            'important' => 1,
            'name' => '血红蛋白',
            'alias' => 'HGB'
        ],[
            'id' => 49,
            'type' => 'renal',
            'important' => 0,
            'name' => '总蛋白',
            'alias' => 'TP'
        ],[
            'id' => 50,
            'type' => 'renal',
            'important' => 0,
            'name' => '白蛋白',
            'alias' => 'ALB'
        ],[
            'id' => 51,
            'type' => 'renal',
            'important' => 0,
            'name' => '钠',
            'alias' => 'NA'
        ],[
            'id' => 52,
            'type' => 'renal',
            'important' => 0,
            'name' => '氯',
            'alias' => 'CL'
        ],[
            'id' => 53,
            'type' => 'renal',
            'important' => 0,
            'name' => '二氧化碳结合力',
            'alias' => 'CO2CP'
        ],[
            'id' => 54,
            'type' => 'renal',
            'important' => 0,
            'name' => '磷',
            'alias' => 'P'
        ],[
            'id' => 55,
            'type' => 'renal',
            'important' => 0,
            'name' => '镁',
            'alias' => 'MG'
        ],[
            'id' => 56,
            'type' => 'renal',
            'important' => 0,
            'name' => '甘油三酯',
            'alias' => 'TG'
        ],[
            'id' => 57,
            'type' => 'renal',
            'important' => 0,
            'name' => '血清总胆固醇',
            'alias' => 'TC'
        ],[
            'id' => 58,
            'type' => 'renal',
            'important' => 0,
            'name' => '低密度脂蛋白胆固醇',
            'alias' => 'LDL-C'
        ],[
            'id' => 59,
            'type' => 'renal',
            'important' => 0,
            'name' => '葡萄糖',
            'alias' => 'GLU'
        ],[
            'id' => 60,
            'type' => 'renal',
            'important' => 0,
            'name' => '前白蛋白',
            'alias' => 'PA'
        ],[
            'id' => 61,
            'type' => 'renal',
            'important' => 0,
            'name' => '糖化白蛋白％',
            'alias' => 'GA'
        ],[
            'id' => 62,
            'type' => 'renal',
            'important' => 0,
            'name' => '甲状旁腺（激）素',
            'alias' => 'PTH'
        ],[
            'id' => 63,
            'type' => 'heart',
            'important' => 1,
            'name' => '谷草转氨酶',
            'alias' => 'AST'
        ],[
            'id' => 64,
            'type' => 'heart',
            'important' => 1,
            'name' => '肌酸酶同工酶',
            'alias' => 'CK-MB'
        ],[
            'id' => 65,
            'type' => 'heart',
            'important' => 1,
            'name' => '肌酸激酶',
            'alias' => 'CK'
        ],[
            'id' => 66,
            'type' => 'heart',
            'important' => 1,
            'name' => '乳酸脱氢酶',
            'alias' => 'LDH/LD'
        ],[
            'id' => 67,
            'type' => 'heart',
            'important' => 1,
            'name' => 'a-丁酸脱氢酶',
            'alias' => 'HBDH'
        ],[
            'id' => 68,
            'type' => 'heart',
            'important' => 0,
            'name' => '钾',
            'alias' => 'K'
        ],[
            'id' => 69,
            'type' => 'heart',
            'important' => 0,
            'name' => '钠',
            'alias' => 'NA'
        ],[
            'id' => 70,
            'type' => 'heart',
            'important' => 0,
            'name' => '低密度脂蛋白胆固醇',
            'alias' => 'LDL-C'
        ],[
            'id' => 71,
            'type' => 'heart',
            'important' => 0,
            'name' => 'C反应蛋白',
            'alias' => 'CRP'
        ],[
            'id' => 72,
            'type' => 'heart',
            'important' => 0,
            'name' => '嗜酸性粒细胞比值',
            'alias' => 'EO%'
        ],[
            'id' => 73,
            'type' => 'immunity',
            'important' => 1,
            'name' => '白细胞计数',
            'alias' => 'WBC'
        ],[
            'id' => 74,
            'type' => 'immunity',
            'important' => 1,
            'name' => '中性粒细胞比值',
            'alias' => 'NEUT%'
        ],[
            'id' => 75,
            'type' => 'immunity',
            'important' => 1,
            'name' => '淋巴细胞比值',
            'alias' => 'LYMPH%'
        ],[
            'id' => 76,
            'type' => 'immunity',
            'important' => 1,
            'name' => '中性粒细胞(绝)',
            'alias' => 'NEUT#'
        ],[
            'id' => 77,
            'type' => 'immunity',
            'important' => 1,
            'name' => '淋巴细胞(绝)',
            'alias' => 'LYMPH#'
        ],[
            'id' => 78,
            'type' => 'immunity',
            'important' => 1,
            'name' => 'C反应蛋白',
            'alias' => 'CRP'
        ],[
            'id' => 79,
            'type' => 'immunity',
            'important' => 0,
            'name' => '球蛋白',
            'alias' => 'GLB'
        ],[
            'id' => 80,
            'type' => 'immunity',
            'important' => 0,
            'name' => '白球比例',
            'alias' => 'A/G'
        ],[
            'id' => 81,
            'type' => 'immunity',
            'important' => 0,
            'name' => 'T淋巴细胞（CD3+CD19-)',
            'alias' => ''
        ],[
            'id' => 82,
            'type' => 'immunity',
            'important' => 0,
            'name' => 'B淋巴细胞（CD3-CD19+)',
            'alias' => ''
        ],[
            'id' => 83,
            'type' => 'immunity',
            'important' => 0,
            'name' => 'NK细胞（CD3-CD16+56+)',
            'alias' => ''
        ],[
            'id' => 84,
            'type' => 'immunity',
            'important' => 0,
            'name' => '辅助性诱导性T细胞(CD3+CD4+)',
            'alias' => 'TH'
        ],[
            'id' => 85,
            'type' => 'immunity',
            'important' => 0,
            'name' => '抑制性杀伤性T细胞(CD3+CD8+)',
            'alias' => 'TS'
        ],[
            'id' => 86,
            'type' => 'immunity',
            'important' => 0,
            'name' => 'CD4+/CD8+(CD4+/CD8+)',
            'alias' => ''
        ],[
            'id' => 87,
            'type' => 'immunity',
            'important' => 0,
            'name' => '调节T细胞（CD4++/25++/127-)',
            'alias' => ''
        ],[
            'id' => 88,
            'type' => 'immunity',
            'important' => 0,
            'name' => '降钙素原',
            'alias' => 'PCT_PROCALCITONIN'
        ],[
            'id' => 89,
            'type' => 'immunity',
            'important' => 0,
            'name' => '单核细胞(绝)',
            'alias' => 'MONO#'
        ],[
            'id' => 90,
            'type' => 'immunity',
            'important' => 0,
            'name' => '嗜酸性细胞(绝)',
            'alias' => 'EO#'
        ],[
            'id' => 91,
            'type' => 'immunity',
            'important' => 0,
            'name' => '嗜酸性粒细胞比值',
            'alias' => 'EO%'
        ],[
            'id' => 92,
            'type' => 'immunity',
            'important' => 0,
            'name' => '单核细胞比值',
            'alias' => 'MONO%'
        ],[
            'id' => 93,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '白细胞计数',
            'alias' => 'WBC'
        ],[
            'id' => 94,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '中性粒细胞绝对值',
            'alias' => 'NEUT#'
        ],[
            'id' => 95,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '淋巴细胞绝对值',
            'alias' => 'LYMPH#'
        ],[
            'id' => 96,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '单核细胞绝对值',
            'alias' => 'MONO#'
        ],[
            'id' => 97,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '嗜酸性粒细胞绝对值',
            'alias' => 'EO#'
        ],[
            'id' => 98,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '嗜碱性粒细胞绝对值',
            'alias' => 'BASO#'
        ],[
            'id' => 99,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '中性粒细胞百分比',
            'alias' => 'NEUT%'
        ],[
            'id' => 100,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '淋巴细胞百分比',
            'alias' => 'LYMPH%'
        ],[
            'id' => 101,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '单核细胞百分比',
            'alias' => 'MONO%'
        ],[
            'id' => 102,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '嗜酸性粒细胞百分比',
            'alias' => 'EO%'
        ],[
            'id' => 103,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '嗜碱性粒细胞百分比',
            'alias' => 'BASO%'
        ],[
            'id' => 104,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '红细胞计数',
            'alias' => 'RBC'
        ],[
            'id' => 105,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '血红蛋白',
            'alias' => 'HGB'
        ],[
            'id' => 106,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '红细胞压积',
            'alias' => 'HCT'
        ],[
            'id' => 107,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '平均红细胞体积',
            'alias' => 'MCV'
        ],[
            'id' => 108,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '平均血红蛋白量',
            'alias' => 'MCH'
        ],[
            'id' => 109,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '平均血红蛋白浓度',
            'alias' => 'MCHC'
        ],[
            'id' => 110,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '红细胞分布密度',
            'alias' => 'RDW-CV'
        ],[
            'id' => 111,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '红细胞分布宽度变异',
            'alias' => 'RDW-SD'
        ],[
            'id' => 112,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '血小板计数',
            'alias' => 'PLT'
        ],[
            'id' => 113,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '平均血小板体积',
            'alias' => 'MPV'
        ],[
            'id' => 114,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '血小板分布宽度',
            'alias' => 'PDW'
        ],[
            'id' => 115,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '血小板压积',
            'alias' => 'PCT_PLATELET'
        ],[
            'id' => 116,
            'type' => 'routine_blood',
            'important' => 0,
            'name' => '大型血小板比例',
            'alias' => 'P-LCR'
        ]]);
    }
}
