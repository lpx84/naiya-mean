<?php

use Illuminate\Database\Seeder;

class AttrValueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attr_value')->delete();
        
        \DB::table('attr_value')->insert(array (
            0 => 
            array (
                'id' => 1,
                'anid' => 1,
                'value' => '德国',
            ),
            1 => 
            array (
                'id' => 2,
                'anid' => 1,
                'value' => '法国',
            ),
            2 => 
            array (
                'id' => 3,
                'anid' => 1,
                'value' => '中国',
            ),
            3 => 
            array (
                'id' => 4,
                'anid' => 1,
                'value' => '美国',
            ),
            4 => 
            array (
                'id' => 5,
                'anid' => 1,
                'value' => '荷兰',
            ),
            5 => 
            array (
                'id' => 6,
                'anid' => 1,
                'value' => '澳大利亚',
            ),
            6 => 
            array (
                'id' => 7,
                'anid' => 1,
                'value' => '新西兰',
            ),
            7 => 
            array (
                'id' => 8,
                'anid' => 1,
                'value' => '爱尔兰',
            ),
            8 => 
            array (
                'id' => 9,
                'anid' => 1,
                'value' => '新加坡',
            ),
            9 => 
            array (
                'id' => 10,
                'anid' => 1,
                'value' => '英国',
            ),
            10 => 
            array (
                'id' => 11,
                'anid' => 1,
                'value' => '丹麦',
            ),
            11 => 
            array (
                'id' => 12,
                'anid' => 1,
                'value' => '瑞士',
            ),
            12 => 
            array (
                'id' => 14,
                'anid' => 3,
                'value' => '0-6个月',
            ),
            13 => 
            array (
                'id' => 15,
                'anid' => 3,
                'value' => '6-12个月',
            ),
            14 => 
            array (
                'id' => 16,
                'anid' => 3,
                'value' => '1-3岁',
            ),
            15 => 
            array (
                'id' => 17,
                'anid' => 3,
                'value' => '3岁以上',
            ),
            16 => 
            array (
                'id' => 18,
                'anid' => 4,
                'value' => 'NB',
            ),
            17 => 
            array (
                'id' => 19,
                'anid' => 4,
                'value' => 'S',
            ),
            18 => 
            array (
                'id' => 20,
                'anid' => 4,
                'value' => 'M',
            ),
            19 => 
            array (
                'id' => 21,
                'anid' => 4,
                'value' => 'L',
            ),
            20 => 
            array (
                'id' => 22,
                'anid' => 4,
                'value' => 'XL',
            ),
            21 => 
            array (
                'id' => 23,
                'anid' => 4,
                'value' => 'XXL',
            ),
            22 => 
            array (
                'id' => 24,
                'anid' => 5,
                'value' => '1-10',
            ),
            23 => 
            array (
                'id' => 25,
                'anid' => 5,
                'value' => '10-20',
            ),
            24 => 
            array (
                'id' => 35,
                'anid' => 5,
                'value' => '20-30',
            ),
            25 => 
            array (
                'id' => 36,
                'anid' => 1,
                'value' => '日本',
            ),
            26 => 
            array (
                'id' => 37,
                'anid' => 1,
                'value' => '中国台湾',
            ),
            27 => 
            array (
                'id' => 38,
                'anid' => 1,
                'value' => '匈牙利',
            ),
            28 => 
            array (
                'id' => 39,
                'anid' => 1,
                'value' => '泰国',
            ),
            29 => 
            array (
                'id' => 40,
                'anid' => 1,
                'value' => '瑞典',
            ),
            30 => 
            array (
                'id' => 41,
                'anid' => 1,
                'value' => '韩国',
            ),
            31 => 
            array (
                'id' => 42,
                'anid' => 1,
                'value' => '马来西亚',
            ),
            32 => 
            array (
                'id' => 43,
                'anid' => 6,
                'value' => 'PP',
            ),
            33 => 
            array (
                'id' => 44,
                'anid' => 6,
                'value' => '乳胶',
            ),
            34 => 
            array (
                'id' => 45,
                'anid' => 6,
                'value' => '其他',
            ),
            35 => 
            array (
                'id' => 46,
                'anid' => 6,
                'value' => '橡胶',
            ),
            36 => 
            array (
                'id' => 47,
                'anid' => 6,
                'value' => '毛绒',
            ),
            37 => 
            array (
                'id' => 48,
                'anid' => 6,
                'value' => '玻璃',
            ),
            38 => 
            array (
                'id' => 49,
                'anid' => 6,
                'value' => '硅胶',
            ),
            39 => 
            array (
                'id' => 50,
                'anid' => 6,
                'value' => '聚酯纤维',
            ),
            40 => 
            array (
                'id' => 51,
                'anid' => 7,
                'value' => '10-40',
            ),
            41 => 
            array (
                'id' => 52,
                'anid' => 7,
                'value' => '10-150',
            ),
            42 => 
            array (
                'id' => 53,
                'anid' => 7,
                'value' => '150-310',
            ),
            43 => 
            array (
                'id' => 63,
                'anid' => 1,
                'value' => '加拿大',
            ),
            44 => 
            array (
                'id' => 64,
                'anid' => 7,
                'value' => '120-210',
            ),
            45 => 
            array (
                'id' => 65,
                'anid' => 7,
                'value' => '210-290',
            ),
            46 => 
            array (
                'id' => 66,
                'anid' => 7,
                'value' => '290-400',
            ),
            47 => 
            array (
                'id' => 67,
                'anid' => 9,
                'value' => '片装',
            ),
            48 => 
            array (
                'id' => 68,
                'anid' => 9,
                'value' => '瓶装',
            ),
            49 => 
            array (
                'id' => 69,
                'anid' => 9,
                'value' => '盒装',
            ),
            50 => 
            array (
                'id' => 70,
                'anid' => 7,
                'value' => '10-90',
            ),
            51 => 
            array (
                'id' => 71,
                'anid' => 7,
                'value' => '90-160',
            ),
            52 => 
            array (
                'id' => 72,
                'anid' => 7,
                'value' => '160-720',
            ),
            53 => 
            array (
                'id' => 73,
                'anid' => 7,
                'value' => '720-1300',
            ),
            54 => 
            array (
                'id' => 74,
                'anid' => 7,
                'value' => '1300-2300',
            ),
            55 => 
            array (
                'id' => 75,
                'anid' => 1,
                'value' => '印度',
            ),
            56 => 
            array (
                'id' => 76,
                'anid' => 1,
                'value' => '奥地利',
            ),
            57 => 
            array (
                'id' => 77,
                'anid' => 1,
                'value' => '秘鲁',
            ),
            58 => 
            array (
                'id' => 78,
                'anid' => 6,
                'value' => 'ABS树脂',
            ),
            59 => 
            array (
                'id' => 79,
                'anid' => 6,
                'value' => 'Abs',
            ),
            60 => 
            array (
                'id' => 80,
                'anid' => 6,
                'value' => 'PVC',
            ),
            61 => 
            array (
                'id' => 81,
                'anid' => 6,
                'value' => '塑料',
            ),
            62 => 
            array (
                'id' => 82,
                'anid' => 6,
                'value' => '帆布',
            ),
            63 => 
            array (
                'id' => 83,
                'anid' => 6,
                'value' => '聚丙烯',
            ),
            64 => 
            array (
                'id' => 84,
                'anid' => 6,
                'value' => '聚乙烯',
            ),
            65 => 
            array (
                'id' => 85,
                'anid' => 7,
                'value' => '50-430',
            ),
            66 => 
            array (
                'id' => 86,
                'anid' => 7,
                'value' => '430-810',
            ),
            67 => 
            array (
                'id' => 87,
                'anid' => 7,
                'value' => '810-1500',
            ),
            68 => 
            array (
                'id' => 88,
                'anid' => 7,
                'value' => '0-90',
            ),
            69 => 
            array (
                'id' => 89,
                'anid' => 7,
                'value' => '90-280',
            ),
            70 => 
            array (
                'id' => 90,
                'anid' => 7,
                'value' => '280-550',
            ),
            71 => 
            array (
                'id' => 91,
                'anid' => 10,
                'value' => '中性及干性肤质',
            ),
            72 => 
            array (
                'id' => 92,
                'anid' => 10,
                'value' => '任何肤质',
            ),
            73 => 
            array (
                'id' => 93,
                'anid' => 10,
                'value' => '干性肤质',
            ),
            74 => 
            array (
                'id' => 94,
                'anid' => 10,
                'value' => '敏感性肤质',
            ),
            75 => 
            array (
                'id' => 95,
                'anid' => 10,
                'value' => '油性及混合性肤质',
            ),
            76 => 
            array (
                'id' => 96,
                'anid' => 10,
                'value' => '油性肤质',
            ),
            77 => 
            array (
                'id' => 97,
                'anid' => 10,
                'value' => '混合型肤质',
            ),
            78 => 
            array (
                'id' => 98,
                'anid' => 10,
                'value' => '粉刺/暗疮/痘痘肤质',
            ),
            79 => 
            array (
                'id' => 99,
                'anid' => 11,
                'value' => '保湿',
            ),
            80 => 
            array (
                'id' => 100,
                'anid' => 11,
                'value' => '净化排毒',
            ),
            81 => 
            array (
                'id' => 101,
                'anid' => 11,
                'value' => '去红血丝',
            ),
            82 => 
            array (
                'id' => 102,
                'anid' => 11,
                'value' => '去角质',
            ),
            83 => 
            array (
                'id' => 103,
                'anid' => 11,
                'value' => '去黑头',
            ),
            84 => 
            array (
                'id' => 104,
                'anid' => 11,
                'value' => '去黑眼圈',
            ),
            85 => 
            array (
                'id' => 105,
                'anid' => 11,
                'value' => '密集修护',
            ),
            86 => 
            array (
                'id' => 106,
                'anid' => 11,
                'value' => '抗敏感',
            ),
            87 => 
            array (
                'id' => 107,
                'anid' => 11,
                'value' => '抗氧化',
            ),
            88 => 
            array (
                'id' => 108,
                'anid' => 11,
                'value' => '抗菌',
            ),
            89 => 
            array (
                'id' => 109,
                'anid' => 11,
                'value' => '抗皱',
            ),
            90 => 
            array (
                'id' => 110,
                'anid' => 11,
                'value' => '抗衰老',
            ),
            91 => 
            array (
                'id' => 111,
                'anid' => 11,
                'value' => '损伤修复',
            ),
            92 => 
            array (
                'id' => 112,
                'anid' => 11,
                'value' => '控油',
            ),
            93 => 
            array (
                'id' => 113,
                'anid' => 11,
                'value' => '提亮肤色',
            ),
            94 => 
            array (
                'id' => 114,
                'anid' => 11,
                'value' => '提拉紧致',
            ),
            95 => 
            array (
                'id' => 115,
                'anid' => 11,
                'value' => '收缩毛孔',
            ),
            96 => 
            array (
                'id' => 116,
                'anid' => 11,
                'value' => '晒后修复',
            ),
            97 => 
            array (
                'id' => 117,
                'anid' => 11,
                'value' => '消炎镇定',
            ),
            98 => 
            array (
                'id' => 118,
                'anid' => 11,
                'value' => '消除水肿',
            ),
            99 => 
            array (
                'id' => 119,
                'anid' => 11,
                'value' => '深层清洁',
            ),
            100 => 
            array (
                'id' => 120,
                'anid' => 11,
                'value' => '深层滋养',
            ),
            101 => 
            array (
                'id' => 121,
                'anid' => 11,
                'value' => '深度保湿',
            ),
            102 => 
            array (
                'id' => 122,
                'anid' => 11,
                'value' => '清润排毒',
            ),
            103 => 
            array (
                'id' => 123,
                'anid' => 11,
                'value' => '滋润爽滑',
            ),
            104 => 
            array (
                'id' => 124,
                'anid' => 11,
                'value' => '眼部抗皱',
            ),
            105 => 
            array (
                'id' => 125,
                'anid' => 11,
                'value' => '祛斑',
            ),
            106 => 
            array (
                'id' => 126,
                'anid' => 11,
                'value' => '祛粉刺',
            ),
            107 => 
            array (
                'id' => 127,
                'anid' => 11,
                'value' => '补水美白',
            ),
            108 => 
            array (
                'id' => 128,
                'anid' => 12,
                'value' => '女',
            ),
            109 => 
            array (
                'id' => 129,
                'anid' => 12,
                'value' => '男',
            ),
            110 => 
            array (
                'id' => 130,
                'anid' => 12,
                'value' => '通用',
            ),
            111 => 
            array (
                'id' => 131,
                'anid' => 13,
                'value' => '棕色',
            ),
            112 => 
            array (
                'id' => 132,
                'anid' => 13,
                'value' => '灰色',
            ),
            113 => 
            array (
                'id' => 133,
                'anid' => 13,
                'value' => '白色',
            ),
            114 => 
            array (
                'id' => 134,
                'anid' => 13,
                'value' => '粉色',
            ),
            115 => 
            array (
                'id' => 135,
                'anid' => 13,
                'value' => '紫色',
            ),
            116 => 
            array (
                'id' => 136,
                'anid' => 13,
                'value' => '红色',
            ),
            117 => 
            array (
                'id' => 137,
                'anid' => 13,
                'value' => '绿色',
            ),
            118 => 
            array (
                'id' => 138,
                'anid' => 13,
                'value' => '花色',
            ),
            119 => 
            array (
                'id' => 139,
                'anid' => 13,
                'value' => '蓝色',
            ),
            120 => 
            array (
                'id' => 140,
                'anid' => 13,
                'value' => '黄色',
            ),
            121 => 
            array (
                'id' => 141,
                'anid' => 13,
                'value' => '黑色',
            ),
            122 => 
            array (
                'id' => 142,
                'anid' => 14,
                'value' => '亚麻',
            ),
            123 => 
            array (
                'id' => 143,
                'anid' => 14,
                'value' => '彩棉',
            ),
            124 => 
            array (
                'id' => 144,
                'anid' => 14,
                'value' => '有机棉',
            ),
            125 => 
            array (
                'id' => 145,
                'anid' => 14,
                'value' => '棉混纺布',
            ),
            126 => 
            array (
                'id' => 146,
                'anid' => 14,
                'value' => '氨纶',
            ),
            127 => 
            array (
                'id' => 147,
                'anid' => 14,
                'value' => '混纺',
            ),
            128 => 
            array (
                'id' => 148,
                'anid' => 14,
                'value' => '牛仔布',
            ),
            129 => 
            array (
                'id' => 149,
                'anid' => 14,
                'value' => '空气棉',
            ),
            130 => 
            array (
                'id' => 150,
                'anid' => 14,
                'value' => '竹纤维',
            ),
            131 => 
            array (
                'id' => 151,
                'anid' => 14,
                'value' => '粘纤',
            ),
            132 => 
            array (
                'id' => 152,
                'anid' => 14,
            'value' => '纯棉(95%及以上)',
            ),
            133 => 
            array (
                'id' => 153,
                'anid' => 14,
                'value' => '聚酯纤维',
            ),
            134 => 
            array (
                'id' => 154,
                'anid' => 14,
                'value' => '莫代尔',
            ),
            135 => 
            array (
                'id' => 155,
                'anid' => 14,
                'value' => '莱卡',
            ),
            136 => 
            array (
                'id' => 156,
                'anid' => 14,
                'value' => '其他',
            ),
            137 => 
            array (
                'id' => 157,
                'anid' => 15,
                'value' => '其他',
            ),
            138 => 
            array (
                'id' => 158,
                'anid' => 15,
                'value' => '52cm',
            ),
            139 => 
            array (
                'id' => 159,
                'anid' => 15,
                'value' => '59cm',
            ),
            140 => 
            array (
                'id' => 160,
                'anid' => 15,
                'value' => '66cm',
            ),
            141 => 
            array (
                'id' => 161,
                'anid' => 15,
                'value' => '73cm',
            ),
            142 => 
            array (
                'id' => 162,
                'anid' => 15,
                'value' => '80cm',
            ),
            143 => 
            array (
                'id' => 163,
                'anid' => 15,
                'value' => '85cm',
            ),
            144 => 
            array (
                'id' => 164,
                'anid' => 15,
                'value' => '90cm',
            ),
            145 => 
            array (
                'id' => 165,
                'anid' => 15,
                'value' => '95cm',
            ),
            146 => 
            array (
                'id' => 166,
                'anid' => 15,
                'value' => '100cm',
            ),
            147 => 
            array (
                'id' => 167,
                'anid' => 15,
                'value' => '105cm',
            ),
            148 => 
            array (
                'id' => 168,
                'anid' => 15,
                'value' => '110cm',
            ),
            149 => 
            array (
                'id' => 169,
                'anid' => 15,
                'value' => '115cm',
            ),
            150 => 
            array (
                'id' => 170,
                'anid' => 15,
                'value' => '120cm',
            ),
            151 => 
            array (
                'id' => 171,
                'anid' => 15,
                'value' => '130cm',
            ),
            152 => 
            array (
                'id' => 172,
                'anid' => 15,
                'value' => '140cm',
            ),
            153 => 
            array (
                'id' => 173,
                'anid' => 15,
                'value' => '150cm',
            ),
            154 => 
            array (
                'id' => 174,
                'anid' => 15,
                'value' => '155cm-165cm',
            ),
            155 => 
            array (
                'id' => 175,
                'anid' => 15,
                'value' => '165cm-175cm',
            ),
            156 => 
            array (
                'id' => 176,
                'anid' => 15,
                'value' => '175cm-185cm',
            ),
            157 => 
            array (
                'id' => 177,
                'anid' => 16,
                'value' => '冬季',
            ),
            158 => 
            array (
                'id' => 178,
                'anid' => 16,
                'value' => '夏季',
            ),
            159 => 
            array (
                'id' => 179,
                'anid' => 16,
                'value' => '春季',
            ),
            160 => 
            array (
                'id' => 180,
                'anid' => 16,
                'value' => '秋季',
            ),
            161 => 
            array (
                'id' => 181,
                'anid' => 7,
                'value' => '20-70',
            ),
            162 => 
            array (
                'id' => 182,
                'anid' => 7,
                'value' => '70-1300',
            ),
            163 => 
            array (
                'id' => 183,
                'anid' => 7,
                'value' => '1300-2500',
            ),
            164 => 
            array (
                'id' => 184,
                'anid' => 7,
                'value' => '2500-4500',
            ),
            165 => 
            array (
                'id' => 185,
                'anid' => 7,
                'value' => '160-280',
            ),
            166 => 
            array (
                'id' => 186,
                'anid' => 7,
                'value' => '280-390',
            ),
            167 => 
            array (
                'id' => 187,
                'anid' => 7,
                'value' => '390-490',
            ),
            168 => 
            array (
                'id' => 188,
                'anid' => 7,
                'value' => '490-630',
            ),
            169 => 
            array (
                'id' => 189,
                'anid' => 7,
                'value' => '30-120',
            ),
            170 => 
            array (
                'id' => 190,
                'anid' => 7,
                'value' => '120-320',
            ),
            171 => 
            array (
                'id' => 191,
                'anid' => 7,
                'value' => '320-520',
            ),
            172 => 
            array (
                'id' => 192,
                'anid' => 7,
                'value' => '520-860',
            ),
            173 => 
            array (
                'id' => 193,
                'anid' => 17,
                'value' => '0-5kg',
            ),
            174 => 
            array (
                'id' => 194,
                'anid' => 17,
                'value' => '10-15kg',
            ),
            175 => 
            array (
                'id' => 195,
                'anid' => 17,
                'value' => '12-17kg',
            ),
            176 => 
            array (
                'id' => 196,
                'anid' => 17,
                'value' => '15-36kg',
            ),
            177 => 
            array (
                'id' => 197,
                'anid' => 17,
                'value' => '25kg以下',
            ),
            178 => 
            array (
                'id' => 198,
                'anid' => 17,
                'value' => '15kg以上',
            ),
            179 => 
            array (
                'id' => 199,
                'anid' => 17,
                'value' => '3-6kg',
            ),
            180 => 
            array (
                'id' => 200,
                'anid' => 17,
                'value' => '3.5-30kg',
            ),
            181 => 
            array (
                'id' => 201,
                'anid' => 17,
                'value' => '4-8kg',
            ),
            182 => 
            array (
                'id' => 202,
                'anid' => 17,
                'value' => '5-10kg',
            ),
            183 => 
            array (
                'id' => 203,
                'anid' => 17,
                'value' => '6-11kg',
            ),
            184 => 
            array (
                'id' => 204,
                'anid' => 17,
                'value' => '7-14kg',
            ),
            185 => 
            array (
                'id' => 205,
                'anid' => 17,
                'value' => '9-14kg',
            ),
            186 => 
            array (
                'id' => 206,
                'anid' => 17,
                'value' => '9-36kg',
            ),
            187 => 
            array (
                'id' => 207,
                'anid' => 18,
                'value' => 'S',
            ),
            188 => 
            array (
                'id' => 208,
                'anid' => 18,
                'value' => 'M',
            ),
            189 => 
            array (
                'id' => 209,
                'anid' => 18,
                'value' => 'L',
            ),
            190 => 
            array (
                'id' => 210,
                'anid' => 18,
                'value' => 'XL',
            ),
            191 => 
            array (
                'id' => 211,
                'anid' => 18,
                'value' => 'XXL',
            ),
            192 => 
            array (
                'id' => 212,
                'anid' => 18,
                'value' => '加大码',
            ),
            193 => 
            array (
                'id' => 213,
                'anid' => 18,
                'value' => '均码',
            ),
            194 => 
            array (
                'id' => 214,
                'anid' => 18,
                'value' => '其他',
            ),
            195 => 
            array (
                'id' => 215,
                'anid' => 17,
                'value' => '0-15KG',
            ),
            196 => 
            array (
                'id' => 216,
                'anid' => 17,
                'value' => '0-18KG',
            ),
            197 => 
            array (
                'id' => 217,
                'anid' => 17,
                'value' => '4-9kg',
            ),
            198 => 
            array (
                'id' => 218,
                'anid' => 17,
                'value' => '10-14KG',
            ),
            199 => 
            array (
                'id' => 219,
                'anid' => 17,
                'value' => '11-25KG',
            ),
            200 => 
            array (
                'id' => 220,
                'anid' => 17,
                'value' => '20-30kg',
            ),
            201 => 
            array (
                'id' => 221,
                'anid' => 17,
                'value' => '20kg以下',
            ),
            202 => 
            array (
                'id' => 222,
                'anid' => 17,
                'value' => '30-40kg',
            ),
            203 => 
            array (
                'id' => 223,
                'anid' => 17,
                'value' => '40-50kg',
            ),
            204 => 
            array (
                'id' => 224,
                'anid' => 17,
                'value' => '50-60kg',
            ),
            205 => 
            array (
                'id' => 225,
                'anid' => 17,
                'value' => '60-70kg',
            ),
            206 => 
            array (
                'id' => 226,
                'anid' => 17,
                'value' => '70kg以上',
            ),
            207 => 
            array (
                'id' => 227,
                'anid' => 17,
                'value' => '100kg以下',
            ),
            208 => 
            array (
                'id' => 228,
                'anid' => 7,
                'value' => '10-30',
            ),
            209 => 
            array (
                'id' => 229,
                'anid' => 7,
                'value' => '30-140',
            ),
            210 => 
            array (
                'id' => 230,
                'anid' => 7,
                'value' => '140-290',
            ),
            211 => 
            array (
                'id' => 231,
                'anid' => 1,
                'value' => '葡萄牙',
            ),
            212 => 
            array (
                'id' => 232,
                'anid' => 19,
                'value' => '其他',
            ),
            213 => 
            array (
                'id' => 233,
                'anid' => 19,
                'value' => '再生浆',
            ),
            214 => 
            array (
                'id' => 234,
                'anid' => 19,
                'value' => '原生浆',
            ),
            215 => 
            array (
                'id' => 235,
                'anid' => 19,
                'value' => '无尘纸',
            ),
            216 => 
            array (
                'id' => 236,
                'anid' => 19,
                'value' => '木浆',
            ),
            217 => 
            array (
                'id' => 237,
                'anid' => 19,
                'value' => '无纺布',
            ),
            218 => 
            array (
                'id' => 238,
                'anid' => 19,
                'value' => '水刺布',
            ),
            219 => 
            array (
                'id' => 239,
                'anid' => 19,
                'value' => '竹浆',
            ),
            220 => 
            array (
                'id' => 240,
                'anid' => 20,
                'value' => '有',
            ),
            221 => 
            array (
                'id' => 241,
                'anid' => 20,
                'value' => '无',
            ),
            222 => 
            array (
                'id' => 242,
                'anid' => 7,
                'value' => '0-40',
            ),
            223 => 
            array (
                'id' => 243,
                'anid' => 7,
                'value' => '40-160',
            ),
            224 => 
            array (
                'id' => 244,
                'anid' => 7,
                'value' => '160-330',
            ),
            225 => 
            array (
                'id' => 245,
                'anid' => 21,
                'value' => '1段',
            ),
            226 => 
            array (
                'id' => 246,
                'anid' => 21,
                'value' => '2段',
            ),
            227 => 
            array (
                'id' => 247,
                'anid' => 21,
                'value' => '3段',
            ),
            228 => 
            array (
                'id' => 248,
                'anid' => 21,
                'value' => '4段',
            ),
            229 => 
            array (
                'id' => 249,
                'anid' => 21,
                'value' => '5段',
            ),
            230 => 
            array (
                'id' => 250,
                'anid' => 21,
                'value' => '6段',
            ),
            231 => 
            array (
                'id' => 251,
                'anid' => 7,
                'value' => '160-370',
            ),
            232 => 
            array (
                'id' => 252,
                'anid' => 7,
                'value' => '370-670',
            ),
            233 => 
            array (
                'id' => 253,
                'anid' => 18,
                'value' => 'NB',
            ),
            234 => 
            array (
                'id' => 254,
                'anid' => 17,
                'value' => '14kg以上',
            ),
            235 => 
            array (
                'id' => 255,
                'anid' => 21,
                'value' => '2+',
            ),
            236 => 
            array (
                'id' => 256,
                'anid' => 9,
                'value' => '桶装',
            ),
            237 => 
            array (
                'id' => 257,
                'anid' => 9,
                'value' => '罐装',
            ),
            238 => 
            array (
                'id' => 258,
                'anid' => 9,
                'value' => '袋装',
            ),
            239 => 
            array (
                'id' => 259,
                'anid' => 22,
                'value' => '混合果蔬汁',
            ),
            240 => 
            array (
                'id' => 260,
                'anid' => 22,
                'value' => '苹果汁',
            ),
            241 => 
            array (
                'id' => 261,
                'anid' => 22,
                'value' => '草莓汁',
            ),
            242 => 
            array (
                'id' => 262,
                'anid' => 22,
                'value' => '葡萄汁',
            ),
            243 => 
            array (
                'id' => 263,
                'anid' => 22,
                'value' => '蓝莓汁',
            ),
            244 => 
            array (
                'id' => 264,
                'anid' => 22,
                'value' => '其他',
            ),
            245 => 
            array (
                'id' => 265,
                'anid' => 7,
                'value' => '0-30',
            ),
            246 => 
            array (
                'id' => 266,
                'anid' => 7,
                'value' => '30-270',
            ),
            247 => 
            array (
                'id' => 267,
                'anid' => 7,
                'value' => '270-510',
            ),
            248 => 
            array (
                'id' => 268,
                'anid' => 7,
                'value' => '510-910',
            ),
            249 => 
            array (
                'id' => 269,
                'anid' => 23,
                'value' => '屁屁',
            ),
            250 => 
            array (
                'id' => 270,
                'anid' => 23,
                'value' => '口鼻',
            ),
            251 => 
            array (
                'id' => 271,
                'anid' => 23,
                'value' => '手部',
            ),
            252 => 
            array (
                'id' => 272,
                'anid' => 23,
                'value' => '面部',
            ),
            253 => 
            array (
                'id' => 273,
                'anid' => 23,
                'value' => '其他',
            ),
            254 => 
            array (
                'id' => 274,
                'anid' => 7,
                'value' => '30-170',
            ),
            255 => 
            array (
                'id' => 275,
                'anid' => 7,
                'value' => '170-370',
            ),
            256 => 
            array (
                'id' => 276,
                'anid' => 9,
                'value' => '礼盒装',
            ),
            257 => 
            array (
                'id' => 277,
                'anid' => 1,
                'value' => '中国香港',
            ),
            258 => 
            array (
                'id' => 278,
                'anid' => 24,
                'value' => '其他',
            ),
            259 => 
            array (
                'id' => 279,
                'anid' => 24,
                'value' => '柠檬热带水果味',
            ),
            260 => 
            array (
                'id' => 280,
                'anid' => 24,
                'value' => '甜橙味',
            ),
            261 => 
            array (
                'id' => 281,
                'anid' => 24,
                'value' => '苹果味',
            ),
            262 => 
            array (
                'id' => 282,
                'anid' => 24,
                'value' => '草莓味',
            ),
            263 => 
            array (
                'id' => 283,
                'anid' => 24,
                'value' => '菠萝味',
            ),
            264 => 
            array (
                'id' => 284,
                'anid' => 24,
                'value' => '葡萄味',
            ),
            265 => 
            array (
                'id' => 285,
                'anid' => 24,
                'value' => '奶桃味',
            ),
            266 => 
            array (
                'id' => 286,
                'anid' => 7,
                'value' => '40-150',
            ),
            267 => 
            array (
                'id' => 287,
                'anid' => 7,
                'value' => '150-300',
            ),
            268 => 
            array (
                'id' => 288,
                'anid' => 25,
                'value' => '10个月以上',
            ),
            269 => 
            array (
                'id' => 289,
                'anid' => 25,
                'value' => '12个月以上',
            ),
            270 => 
            array (
                'id' => 290,
                'anid' => 25,
                'value' => '4个月以上',
            ),
            271 => 
            array (
                'id' => 291,
                'anid' => 25,
                'value' => '5个月以上',
            ),
            272 => 
            array (
                'id' => 292,
                'anid' => 25,
                'value' => '6个月以上',
            ),
            273 => 
            array (
                'id' => 293,
                'anid' => 25,
                'value' => '7个月以上',
            ),
            274 => 
            array (
                'id' => 294,
                'anid' => 25,
                'value' => '8个月以上',
            ),
            275 => 
            array (
                'id' => 295,
                'anid' => 25,
                'value' => '9个月以上',
            ),
            276 => 
            array (
                'id' => 296,
                'anid' => 26,
                'value' => '小馄钝',
            ),
            277 => 
            array (
                'id' => 297,
                'anid' => 26,
                'value' => '米粉',
            ),
            278 => 
            array (
                'id' => 298,
                'anid' => 26,
                'value' => '粥/稀饭',
            ),
            279 => 
            array (
                'id' => 299,
                'anid' => 26,
                'value' => '面类',
            ),
            280 => 
            array (
                'id' => 300,
                'anid' => 26,
                'value' => '麦片',
            ),
            281 => 
            array (
                'id' => 301,
                'anid' => 1,
                'value' => '其他',
            ),
            282 => 
            array (
                'id' => 302,
                'anid' => 7,
                'value' => '40-170',
            ),
            283 => 
            array (
                'id' => 303,
                'anid' => 7,
                'value' => '170-340',
            ),
            284 => 
            array (
                'id' => 304,
                'anid' => 7,
                'value' => '40-60',
            ),
            285 => 
            array (
                'id' => 305,
                'anid' => 7,
                'value' => '60-160',
            ),
            286 => 
            array (
                'id' => 306,
                'anid' => 27,
                'value' => '其他',
            ),
            287 => 
            array (
                'id' => 307,
                'anid' => 27,
                'value' => '牛肉松',
            ),
            288 => 
            array (
                'id' => 308,
                'anid' => 27,
                'value' => '猪肉松',
            ),
            289 => 
            array (
                'id' => 309,
                'anid' => 27,
                'value' => '虾肉松',
            ),
            290 => 
            array (
                'id' => 310,
                'anid' => 27,
                'value' => '鱼肉松',
            ),
            291 => 
            array (
                'id' => 311,
                'anid' => 27,
                'value' => '鸡肉松',
            ),
            292 => 
            array (
                'id' => 312,
                'anid' => 28,
                'value' => '其他',
            ),
            293 => 
            array (
                'id' => 313,
                'anid' => 28,
                'value' => '牛肉泥',
            ),
            294 => 
            array (
                'id' => 314,
                'anid' => 28,
                'value' => '猪肉泥',
            ),
            295 => 
            array (
                'id' => 315,
                'anid' => 28,
                'value' => '鱼肉泥',
            ),
            296 => 
            array (
                'id' => 316,
                'anid' => 28,
                'value' => '鸡肉泥',
            ),
            297 => 
            array (
                'id' => 317,
                'anid' => 7,
                'value' => '150-290',
            ),
            298 => 
            array (
                'id' => 318,
                'anid' => 26,
                'value' => '果条',
            ),
            299 => 
            array (
                'id' => 319,
                'anid' => 26,
                'value' => '果泥',
            ),
            300 => 
            array (
                'id' => 320,
                'anid' => 26,
                'value' => '混合泥',
            ),
            301 => 
            array (
                'id' => 321,
                'anid' => 26,
                'value' => '肉泥',
            ),
            302 => 
            array (
                'id' => 322,
                'anid' => 26,
                'value' => '菜泥',
            ),
            303 => 
            array (
                'id' => 323,
                'anid' => 29,
                'value' => '菜乳酪味',
            ),
            304 => 
            array (
                'id' => 324,
                'anid' => 29,
                'value' => '全麦味',
            ),
            305 => 
            array (
                'id' => 325,
                'anid' => 29,
                'value' => '南瓜味',
            ),
            306 => 
            array (
                'id' => 326,
                'anid' => 29,
                'value' => '卡布奇诺味',
            ),
            307 => 
            array (
                'id' => 327,
                'anid' => 29,
                'value' => '原味',
            ),
            308 => 
            array (
                'id' => 328,
                'anid' => 29,
                'value' => '哈密瓜',
            ),
            309 => 
            array (
                'id' => 329,
                'anid' => 29,
                'value' => '奶酷味',
            ),
            310 => 
            array (
                'id' => 330,
                'anid' => 29,
                'value' => '奶香味',
            ),
            311 => 
            array (
                'id' => 331,
                'anid' => 29,
                'value' => '巧克力味',
            ),
            312 => 
            array (
                'id' => 332,
                'anid' => 29,
                'value' => '杏仁味',
            ),
            313 => 
            array (
                'id' => 333,
                'anid' => 29,
                'value' => '椰奶味',
            ),
            314 => 
            array (
                'id' => 334,
                'anid' => 29,
                'value' => '海苔味',
            ),
            315 => 
            array (
                'id' => 335,
                'anid' => 29,
                'value' => '牛奶味',
            ),
            316 => 
            array (
                'id' => 336,
                'anid' => 29,
                'value' => '玉米味',
            ),
            317 => 
            array (
                'id' => 337,
                'anid' => 29,
                'value' => '综合口味',
            ),
            318 => 
            array (
                'id' => 338,
                'anid' => 29,
                'value' => '芝士味',
            ),
            319 => 
            array (
                'id' => 339,
                'anid' => 29,
                'value' => '芝麻味',
            ),
            320 => 
            array (
                'id' => 340,
                'anid' => 29,
                'value' => '蓝莓味',
            ),
            321 => 
            array (
                'id' => 341,
                'anid' => 29,
                'value' => '草莓味',
            ),
            322 => 
            array (
                'id' => 342,
                'anid' => 29,
                'value' => '其他',
            ),
            323 => 
            array (
                'id' => 343,
                'anid' => 29,
                'value' => '蔓越莓味',
            ),
            324 => 
            array (
                'id' => 344,
                'anid' => 29,
                'value' => '蔬果味',
            ),
            325 => 
            array (
                'id' => 345,
                'anid' => 29,
                'value' => '蔬菜味',
            ),
            326 => 
            array (
                'id' => 346,
                'anid' => 29,
                'value' => '蛋黄味',
            ),
            327 => 
            array (
                'id' => 347,
                'anid' => 29,
                'value' => '香橙味',
            ),
            328 => 
            array (
                'id' => 348,
                'anid' => 29,
                'value' => '香蕉味',
            ),
            329 => 
            array (
                'id' => 349,
                'anid' => 29,
                'value' => '鸡蛋味',
            ),
            330 => 
            array (
                'id' => 351,
                'anid' => 30,
                'value' => '奶酪泡芙条',
            ),
            331 => 
            array (
                'id' => 352,
                'anid' => 30,
                'value' => '小奶豆',
            ),
            332 => 
            array (
                'id' => 353,
                'anid' => 30,
                'value' => '小馒头',
            ),
            333 => 
            array (
                'id' => 354,
                'anid' => 30,
                'value' => '手抓条',
            ),
            334 => 
            array (
                'id' => 355,
                'anid' => 30,
                'value' => '泡芙条',
            ),
            335 => 
            array (
                'id' => 356,
                'anid' => 30,
                'value' => '磨牙饼干',
            ),
            336 => 
            array (
                'id' => 357,
                'anid' => 30,
                'value' => '米饼',
            ),
            337 => 
            array (
                'id' => 358,
                'anid' => 30,
                'value' => '饼干',
            ),
            338 => 
            array (
                'id' => 359,
                'anid' => 30,
                'value' => '其他',
            ),
            339 => 
            array (
                'id' => 360,
                'anid' => 21,
                'value' => 'Pre段',
            ),
        ));
        
        
    }
}
