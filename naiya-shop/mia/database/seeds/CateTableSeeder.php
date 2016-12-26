<?php

use Illuminate\Database\Seeder;

class CateTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cate')->delete();
        
        \DB::table('cate')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '奶粉|纸尿裤',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '辅食|喂养|洗护',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '孕妈用品',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '童装|童鞋|寝居',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '玩具|书籍|出行',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '美妆|个护|轻奢',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '美食|保健',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '宝宝奶粉',
                'pid' => 1,
                'path' => '0,1',
                'status' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '屁屁护理',
                'pid' => 1,
                'path' => '0,1',
                'status' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '全球奶粉大牌',
                'pid' => 1,
                'path' => '0,1',
                'status' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '全球纸尿裤大牌',
                'pid' => 1,
                'path' => '0,1',
                'status' => 1,
            ),
            11 => 
            array (
                'id' => 13,
                'name' => '宝宝食品',
                'pid' => 2,
                'path' => '0,2',
                'status' => 1,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => '宝宝用品',
                'pid' => 2,
                'path' => '0,2',
                'status' => 1,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => '宝宝洗护',
                'pid' => 2,
                'path' => '0,2',
                'status' => 1,
            ),
            14 => 
            array (
                'id' => 16,
                'name' => '宝宝营养',
                'pid' => 2,
                'path' => '0,2',
                'status' => 1,
            ),
            15 => 
            array (
                'id' => 17,
                'name' => '喂养用品',
                'pid' => 2,
                'path' => '0,2',
                'status' => 1,
            ),
            16 => 
            array (
                'id' => 19,
                'name' => '母乳喂养',
                'pid' => 3,
                'path' => '0,3',
                'status' => 1,
            ),
            17 => 
            array (
                'id' => 20,
                'name' => '孕产待产',
                'pid' => 3,
                'path' => '0,3',
                'status' => 1,
            ),
            18 => 
            array (
                'id' => 21,
                'name' => '婴幼儿服',
                'pid' => 4,
                'path' => '0,4',
                'status' => 1,
            ),
            19 => 
            array (
                'id' => 22,
                'name' => '童鞋',
                'pid' => 4,
                'path' => '0,4',
                'status' => 1,
            ),
            20 => 
            array (
                'id' => 23,
                'name' => '童装',
                'pid' => 4,
                'path' => '0,4',
                'status' => 1,
            ),
            21 => 
            array (
                'id' => 24,
                'name' => '宝宝寝居',
                'pid' => 4,
                'path' => '0,4',
                'status' => 1,
            ),
            22 => 
            array (
                'id' => 26,
                'name' => '玩具',
                'pid' => 5,
                'path' => '0,5',
                'status' => 1,
            ),
            23 => 
            array (
                'id' => 27,
                'name' => '出行装备',
                'pid' => 5,
                'path' => '0,5',
                'status' => 1,
            ),
            24 => 
            array (
                'id' => 28,
                'name' => '书籍',
                'pid' => 5,
                'path' => '0,5',
                'status' => 1,
            ),
            25 => 
            array (
                'id' => 29,
                'name' => 'pre',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            26 => 
            array (
                'id' => 30,
                'name' => '一段',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            27 => 
            array (
                'id' => 31,
                'name' => '二段',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            28 => 
            array (
                'id' => 32,
                'name' => '三段',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            29 => 
            array (
                'id' => 33,
                'name' => '四段',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            30 => 
            array (
                'id' => 34,
                'name' => '五段',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            31 => 
            array (
                'id' => 35,
                'name' => '六段',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            32 => 
            array (
                'id' => 36,
                'name' => '成长1+',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            33 => 
            array (
                'id' => 37,
                'name' => '成长2+',
                'pid' => 8,
                'path' => '0,1,8',
                'status' => 1,
            ),
            34 => 
            array (
                'id' => 38,
                'name' => '拉拉裤',
                'pid' => 9,
                'path' => '0,1,9',
                'status' => 1,
            ),
            35 => 
            array (
                'id' => 39,
                'name' => '家居纸品',
                'pid' => 9,
                'path' => '0,1,9',
                'status' => 1,
            ),
            36 => 
            array (
                'id' => 40,
                'name' => '纸尿裤',
                'pid' => 9,
                'path' => '0,1,9',
                'status' => 1,
            ),
            37 => 
            array (
                'id' => 41,
                'name' => '宝宝湿巾',
                'pid' => 9,
                'path' => '0,1,9',
                'status' => 1,
            ),
            38 => 
            array (
                'id' => 42,
                'name' => '隔尿垫|布尿裤',
                'pid' => 9,
                'path' => '0,1,9',
                'status' => 1,
            ),
            39 => 
            array (
                'id' => 43,
                'name' => '家居清洁',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            40 => 
            array (
                'id' => 44,
                'name' => '面部护肤',
                'pid' => 6,
                'path' => '0,6',
                'status' => 1,
            ),
            41 => 
            array (
                'id' => 45,
                'name' => '熟女轻奢',
                'pid' => 6,
                'path' => '0,6',
                'status' => 1,
            ),
            42 => 
            array (
                'id' => 46,
                'name' => '个人护理',
                'pid' => 6,
                'path' => '0,6',
                'status' => 1,
            ),
            43 => 
            array (
                'id' => 47,
                'name' => '进口食品',
                'pid' => 7,
                'path' => '0,7',
                'status' => 1,
            ),
            44 => 
            array (
                'id' => 48,
                'name' => '营养健康',
                'pid' => 7,
                'path' => '0,7',
                'status' => 1,
            ),
            45 => 
            array (
                'id' => 51,
                'name' => '清洁消毒',
                'pid' => 43,
                'path' => '0,43',
                'status' => 1,
            ),
            46 => 
            array (
                'id' => 52,
                'name' => '家居生活',
                'pid' => 43,
                'path' => '0,43',
                'status' => 1,
            ),
            47 => 
            array (
                'id' => 53,
                'name' => '果汁|饮品',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            48 => 
            array (
                'id' => 54,
                'name' => '糖果|零食',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            49 => 
            array (
                'id' => 55,
                'name' => '米粉|面食',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            50 => 
            array (
                'id' => 56,
                'name' => '酸奶粉',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            51 => 
            array (
                'id' => 57,
                'name' => '果泥|果条',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            52 => 
            array (
                'id' => 58,
                'name' => '肉泥|肉松',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            53 => 
            array (
                'id' => 59,
                'name' => '鱼肠|海苔',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            54 => 
            array (
                'id' => 60,
                'name' => '泡芙|饼干',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            55 => 
            array (
                'id' => 61,
                'name' => '奶酪|溶豆',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            56 => 
            array (
                'id' => 62,
                'name' => '食用油|调味品',
                'pid' => 13,
                'path' => '0,2,13',
                'status' => 1,
            ),
            57 => 
            array (
                'id' => 63,
                'name' => '洗澡用品',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            58 => 
            array (
                'id' => 64,
                'name' => '医护用品',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            59 => 
            array (
                'id' => 65,
                'name' => '日用配件',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            60 => 
            array (
                'id' => 66,
                'name' => '如厕训练',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            61 => 
            array (
                'id' => 67,
                'name' => '理发|梳发',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            62 => 
            array (
                'id' => 68,
                'name' => '口腔护理',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            63 => 
            array (
                'id' => 69,
                'name' => '鼻腔护理',
                'pid' => 14,
                'path' => '0,2,14',
                'status' => 1,
            ),
            64 => 
            array (
                'id' => 70,
                'name' => '全球最热奶瓶精选',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            65 => 
            array (
                'id' => 71,
                'name' => '奶瓶|奶嘴',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            66 => 
            array (
                'id' => 72,
                'name' => '安抚奶嘴',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            67 => 
            array (
                'id' => 73,
                'name' => '碗碟餐具',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            68 => 
            array (
                'id' => 74,
                'name' => '食物制作',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            69 => 
            array (
                'id' => 75,
                'name' => '食物储存',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            70 => 
            array (
                'id' => 76,
                'name' => '水杯|水壶',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            71 => 
            array (
                'id' => 77,
                'name' => '奶瓶清洁',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            72 => 
            array (
                'id' => 78,
                'name' => '保温|消毒',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            73 => 
            array (
                'id' => 79,
                'name' => '围兜|防溅衣',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            74 => 
            array (
                'id' => 80,
                'name' => '辅助配件',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            75 => 
            array (
                'id' => 81,
                'name' => '餐椅',
                'pid' => 17,
                'path' => '0,2,17',
                'status' => 1,
            ),
            76 => 
            array (
                'id' => 82,
                'name' => '套装|礼盒',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            77 => 
            array (
                'id' => 83,
                'name' => '洗发沐浴',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            78 => 
            array (
                'id' => 84,
                'name' => '乳液|抚触油',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            79 => 
            array (
                'id' => 85,
                'name' => '面霜|万用霜',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            80 => 
            array (
                'id' => 86,
                'name' => '爽身|防晒',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            81 => 
            array (
                'id' => 87,
                'name' => '唇部护理',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            82 => 
            array (
                'id' => 88,
                'name' => '驱蚊|驱虫',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            83 => 
            array (
                'id' => 89,
                'name' => '屁屁霜|护臀霜',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            84 => 
            array (
                'id' => 90,
                'name' => '洗澡用品',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            85 => 
            array (
                'id' => 91,
                'name' => '口腔护理',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            86 => 
            array (
                'id' => 92,
                'name' => '鼻腔护理',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            87 => 
            array (
                'id' => 93,
                'name' => '理发|梳发',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            88 => 
            array (
                'id' => 94,
                'name' => '如厕训练',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            89 => 
            array (
                'id' => 95,
                'name' => '医护用品',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            90 => 
            array (
                'id' => 96,
                'name' => '日用配件',
                'pid' => 15,
                'path' => '0,2,15',
                'status' => 1,
            ),
            91 => 
            array (
                'id' => 97,
                'name' => '吸奶器',
                'pid' => 19,
                'path' => '0,3,19',
                'status' => 1,
            ),
            92 => 
            array (
                'id' => 98,
                'name' => '母乳存储',
                'pid' => 19,
                'path' => '0,3,19',
                'status' => 1,
            ),
            93 => 
            array (
                'id' => 99,
                'name' => '乳房护理|催乳',
                'pid' => 19,
                'path' => '0,3,19',
                'status' => 1,
            ),
            94 => 
            array (
                'id' => 100,
                'name' => '防溢乳垫',
                'pid' => 19,
                'path' => '0,3,19',
                'status' => 1,
            ),
            95 => 
            array (
                'id' => 101,
                'name' => '授乳枕',
                'pid' => 19,
                'path' => '0,3,19',
                'status' => 1,
            ),
            96 => 
            array (
                'id' => 102,
                'name' => '矫正器|配件',
                'pid' => 19,
                'path' => '0,3,19',
                'status' => 1,
            ),
            97 => 
            array (
                'id' => 103,
                'name' => '孕期营养',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            98 => 
            array (
                'id' => 104,
                'name' => '孕妈内衣',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            99 => 
            array (
                'id' => 105,
                'name' => '孕妈服饰',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            100 => 
            array (
                'id' => 106,
                'name' => '孕产|待产',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            101 => 
            array (
                'id' => 107,
                'name' => '产后收腹',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            102 => 
            array (
                'id' => 108,
                'name' => '待产新生',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            103 => 
            array (
                'id' => 109,
                'name' => '防辐射用品',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            104 => 
            array (
                'id' => 110,
                'name' => '孕妈个护',
                'pid' => 20,
                'path' => '0,3,20',
                'status' => 1,
            ),
            105 => 
            array (
                'id' => 111,
                'name' => '新生儿礼盒',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            106 => 
            array (
                'id' => 112,
                'name' => '婴儿内衣',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            107 => 
            array (
                'id' => 113,
                'name' => '连身衣|爬服',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            108 => 
            array (
                'id' => 114,
                'name' => '护脐带|肚兜',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            109 => 
            array (
                'id' => 115,
                'name' => '罩衣|围嘴',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            110 => 
            array (
                'id' => 116,
                'name' => '斗篷|披风',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            111 => 
            array (
                'id' => 117,
                'name' => '手套|脚套|帽子',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            112 => 
            array (
                'id' => 118,
                'name' => '婴儿家居',
                'pid' => 21,
                'path' => '0,4,21',
                'status' => 1,
            ),
            113 => 
            array (
                'id' => 119,
                'name' => '连衣裙|半身裙',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            114 => 
            array (
                'id' => 120,
                'name' => 'T恤|POLO衫',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            115 => 
            array (
                'id' => 121,
                'name' => '衬衫',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            116 => 
            array (
                'id' => 122,
                'name' => '牛仔裤',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            117 => 
            array (
                'id' => 123,
                'name' => '休闲裤',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            118 => 
            array (
                'id' => 124,
                'name' => '吊带|背心',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            119 => 
            array (
                'id' => 125,
                'name' => '背带裤|连体裤',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            120 => 
            array (
                'id' => 126,
                'name' => '亲子装',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            121 => 
            array (
                'id' => 127,
                'name' => '套装',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            122 => 
            array (
                'id' => 128,
                'name' => '家居服|睡衣',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            123 => 
            array (
                'id' => 129,
                'name' => '打底裤|袜品',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            124 => 
            array (
                'id' => 130,
                'name' => '帽子|围巾|手套',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            125 => 
            array (
                'id' => 131,
                'name' => '泳衣|泳帽',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            126 => 
            array (
                'id' => 132,
                'name' => '雨衣|雨具',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            127 => 
            array (
                'id' => 133,
                'name' => '内衣|内裤',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            128 => 
            array (
                'id' => 134,
                'name' => '配饰|发饰',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            129 => 
            array (
                'id' => 135,
                'name' => '太阳镜',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            130 => 
            array (
                'id' => 136,
                'name' => '风衣|外套',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            131 => 
            array (
                'id' => 137,
                'name' => '西服|皮衣|夹克',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            132 => 
            array (
                'id' => 138,
                'name' => '毛衣|针织衫',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            133 => 
            array (
                'id' => 139,
                'name' => '卫衣|绒衫',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            134 => 
            array (
                'id' => 140,
                'name' => '马甲|坎肩',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            135 => 
            array (
                'id' => 141,
                'name' => '棉袄|棉服',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            136 => 
            array (
                'id' => 142,
                'name' => '礼服|演出配饰',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            137 => 
            array (
                'id' => 143,
                'name' => '羽绒服',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            138 => 
            array (
                'id' => 144,
                'name' => '成人鞋服',
                'pid' => 23,
                'path' => '0,4,23',
                'status' => 1,
            ),
            139 => 
            array (
                'id' => 145,
                'name' => '学步鞋|机能鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            140 => 
            array (
                'id' => 146,
                'name' => '运动鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            141 => 
            array (
                'id' => 147,
                'name' => '休闲|帆布鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            142 => 
            array (
                'id' => 148,
                'name' => '皮鞋|公主鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            143 => 
            array (
                'id' => 149,
                'name' => '凉鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            144 => 
            array (
                'id' => 150,
                'name' => '家居鞋|拖鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            145 => 
            array (
                'id' => 151,
                'name' => '雨鞋',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            146 => 
            array (
                'id' => 152,
                'name' => '棉鞋|雪地靴',
                'pid' => 22,
                'path' => '0,4,22',
                'status' => 1,
            ),
            147 => 
            array (
                'id' => 153,
                'name' => '包巾|睡袋',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            148 => 
            array (
                'id' => 154,
                'name' => '宝宝浴巾',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            149 => 
            array (
                'id' => 155,
                'name' => '婴童枕',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            150 => 
            array (
                'id' => 156,
                'name' => '床围|床垫|尿垫',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            151 => 
            array (
                'id' => 157,
                'name' => '被褥|毛毯|套件',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            152 => 
            array (
                'id' => 158,
                'name' => '凉席|蚊帐',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            153 => 
            array (
                'id' => 159,
                'name' => '宝宝床|摇椅',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            154 => 
            array (
                'id' => 160,
                'name' => '家具收纳',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            155 => 
            array (
                'id' => 161,
                'name' => '安全防护',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            156 => 
            array (
                'id' => 162,
                'name' => '装饰小物',
                'pid' => 24,
                'path' => '0,4,24',
                'status' => 1,
            ),
            157 => 
            array (
                'id' => 163,
                'name' => '学步车|摇马',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            158 => 
            array (
                'id' => 164,
                'name' => '益智',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            159 => 
            array (
                'id' => 165,
                'name' => '早教',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            160 => 
            array (
                'id' => 166,
                'name' => '早教',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            161 => 
            array (
                'id' => 167,
                'name' => '绘画工具',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            162 => 
            array (
                'id' => 168,
                'name' => '绘画工具',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            163 => 
            array (
                'id' => 169,
                'name' => '摇铃|车床挂',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            164 => 
            array (
                'id' => 170,
                'name' => '毛绒|安抚',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            165 => 
            array (
                'id' => 171,
                'name' => '音乐玩具',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            166 => 
            array (
                'id' => 172,
                'name' => '牙胶|咬咬胶',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            167 => 
            array (
                'id' => 173,
                'name' => '爬行垫|游戏垫',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            168 => 
            array (
                'id' => 174,
                'name' => '健身架|球类',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            169 => 
            array (
                'id' => 175,
                'name' => '积木|拼插',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            170 => 
            array (
                'id' => 176,
                'name' => '积木|拼插',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            171 => 
            array (
                'id' => 177,
                'name' => '户外运动',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            172 => 
            array (
                'id' => 178,
                'name' => '戏水|游泳装备',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            173 => 
            array (
                'id' => 179,
                'name' => '挖沙玩具',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            174 => 
            array (
                'id' => 180,
                'name' => '遥控玩具',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            175 => 
            array (
                'id' => 181,
                'name' => '布书',
                'pid' => 26,
                'path' => '0,5,26',
                'status' => 1,
            ),
            176 => 
            array (
                'id' => 182,
                'name' => '中文绘本',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            177 => 
            array (
                'id' => 183,
                'name' => '手工|玩具书',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            178 => 
            array (
                'id' => 184,
                'name' => '有声读物',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            179 => 
            array (
                'id' => 185,
                'name' => '原版进口',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            180 => 
            array (
                'id' => 186,
                'name' => '卡通|动漫',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            181 => 
            array (
                'id' => 187,
                'name' => '科普|百科',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            182 => 
            array (
                'id' => 188,
                'name' => '儿童文学',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            183 => 
            array (
                'id' => 189,
                'name' => '启蒙|教育',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            184 => 
            array (
                'id' => 190,
                'name' => '孕产|育儿',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            185 => 
            array (
                'id' => 191,
                'name' => '期刊|杂志',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            186 => 
            array (
                'id' => 192,
                'name' => '生活休闲',
                'pid' => 28,
                'path' => '0,5,28',
                'status' => 1,
            ),
            187 => 
            array (
                'id' => 193,
                'name' => '安全座椅',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            188 => 
            array (
                'id' => 194,
                'name' => '腰凳背带',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            189 => 
            array (
                'id' => 195,
                'name' => '出行箱包',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            190 => 
            array (
                'id' => 196,
                'name' => '出行配件',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            191 => 
            array (
                'id' => 197,
                'name' => '电动车',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            192 => 
            array (
                'id' => 198,
                'name' => '推车|伞车',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            193 => 
            array (
                'id' => 199,
                'name' => '三轮车',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            194 => 
            array (
                'id' => 200,
                'name' => '滑板车',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            195 => 
            array (
                'id' => 201,
                'name' => '自行车',
                'pid' => 27,
                'path' => '0,5,27',
                'status' => 1,
            ),
            196 => 
            array (
                'id' => 202,
                'name' => '洁面|卸妆',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            197 => 
            array (
                'id' => 203,
                'name' => '化妆水|爽肤水',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            198 => 
            array (
                'id' => 204,
                'name' => '面膜',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            199 => 
            array (
                'id' => 205,
                'name' => '乳液|面霜',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            200 => 
            array (
                'id' => 206,
                'name' => '护肤套装',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            201 => 
            array (
                'id' => 207,
                'name' => '防晒|隔离',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            202 => 
            array (
                'id' => 208,
                'name' => '彩妆',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            203 => 
            array (
                'id' => 209,
                'name' => '眼部护理',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            204 => 
            array (
                'id' => 210,
                'name' => '唇部护理',
                'pid' => 44,
                'path' => '0,6,44',
                'status' => 1,
            ),
            205 => 
            array (
                'id' => 211,
                'name' => '手足保养',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            206 => 
            array (
                'id' => 212,
                'name' => '美体塑身',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            207 => 
            array (
                'id' => 213,
                'name' => '美容工具|防晒伞',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            208 => 
            array (
                'id' => 214,
                'name' => '口腔护理',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            209 => 
            array (
                'id' => 215,
                'name' => '洗发护发',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            210 => 
            array (
                'id' => 216,
                'name' => '沐浴护肤',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            211 => 
            array (
                'id' => 217,
                'name' => '私密护理',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            212 => 
            array (
                'id' => 218,
                'name' => '卫生巾',
                'pid' => 46,
                'path' => '0,6,46',
                'status' => 1,
            ),
            213 => 
            array (
                'id' => 219,
                'name' => '包包',
                'pid' => 45,
                'path' => '0,6,45',
                'status' => 1,
            ),
            214 => 
            array (
                'id' => 220,
                'name' => '服饰',
                'pid' => 45,
                'path' => '0,6,45',
                'status' => 1,
            ),
            215 => 
            array (
                'id' => 221,
                'name' => '太阳镜',
                'pid' => 45,
                'path' => '0,6,45',
                'status' => 1,
            ),
            216 => 
            array (
                'id' => 223,
                'name' => '饰品',
                'pid' => 45,
                'path' => '0,6,45',
                'status' => 1,
            ),
            217 => 
            array (
                'id' => 224,
                'name' => '饼干|糕点',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            218 => 
            array (
                'id' => 225,
                'name' => '干果|果干',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            219 => 
            array (
                'id' => 226,
                'name' => '糖果|巧克力',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            220 => 
            array (
                'id' => 227,
                'name' => '冲调|饮品',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            221 => 
            array (
                'id' => 228,
                'name' => '休闲零食',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            222 => 
            array (
                'id' => 229,
                'name' => '面食|调味|油',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            223 => 
            array (
                'id' => 230,
                'name' => '成人奶粉|酸奶粉',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            224 => 
            array (
                'id' => 231,
                'name' => '麦片|蜂奶',
                'pid' => 47,
                'path' => '0,7,47',
                'status' => 1,
            ),
            225 => 
            array (
                'id' => 232,
                'name' => '鱼油|卵磷脂',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            226 => 
            array (
                'id' => 233,
                'name' => '钙+维生素D',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            227 => 
            array (
                'id' => 234,
                'name' => '胶原蛋白',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            228 => 
            array (
                'id' => 235,
                'name' => '综合维生素',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            229 => 
            array (
                'id' => 236,
                'name' => '酵素',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            230 => 
            array (
                'id' => 237,
                'name' => '男士保健',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            231 => 
            array (
                'id' => 238,
                'name' => '蔓越莓|葡萄籽',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            232 => 
            array (
                'id' => 239,
                'name' => '滋补养生',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            233 => 
            array (
                'id' => 240,
                'name' => '瘦身代餐',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            234 => 
            array (
                'id' => 241,
                'name' => '益生菌',
                'pid' => 48,
                'path' => '0,7,48',
                'status' => 1,
            ),
            235 => 
            array (
                'id' => 242,
                'name' => '餐具|果蔬清洁',
                'pid' => 51,
                'path' => '0,43,51',
                'status' => 1,
            ),
            236 => 
            array (
                'id' => 243,
                'name' => '洗衣粉|洗衣液',
                'pid' => 51,
                'path' => '0,43,51',
                'status' => 1,
            ),
            237 => 
            array (
                'id' => 244,
                'name' => '洗衣皂',
                'pid' => 51,
                'path' => '0,43,51',
                'status' => 1,
            ),
            238 => 
            array (
                'id' => 245,
                'name' => '柔顺剂',
                'pid' => 51,
                'path' => '0,43,51',
                'status' => 1,
            ),
            239 => 
            array (
                'id' => 246,
                'name' => '洗手液',
                'pid' => 51,
                'path' => '0,43,51',
                'status' => 1,
            ),
            240 => 
            array (
                'id' => 247,
                'name' => '消毒液|除臭剂',
                'pid' => 51,
                'path' => '0,43,51',
                'status' => 1,
            ),
            241 => 
            array (
                'id' => 248,
                'name' => '浴巾|毛巾',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            242 => 
            array (
                'id' => 249,
                'name' => '睡枕|抱枕',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            243 => 
            array (
                'id' => 250,
                'name' => '生活电器',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            244 => 
            array (
                'id' => 251,
                'name' => '家具|床椅',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            245 => 
            array (
                'id' => 252,
                'name' => '床上用品',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            246 => 
            array (
                'id' => 253,
                'name' => '加湿|净化',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            247 => 
            array (
                'id' => 254,
                'name' => '厨具',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            248 => 
            array (
                'id' => 255,
                'name' => '安全防护',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            249 => 
            array (
                'id' => 256,
                'name' => '收纳用品',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            250 => 
            array (
                'id' => 257,
                'name' => '家装软饰',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            251 => 
            array (
                'id' => 258,
                'name' => '家庭健康',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            252 => 
            array (
                'id' => 259,
                'name' => '厨房电器',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            253 => 
            array (
                'id' => 260,
                'name' => '水杯|水壶',
                'pid' => 52,
                'path' => '0,43,52',
                'status' => 1,
            ),
            254 => 
            array (
                'id' => 261,
                'name' => '鱼油|DHA',
                'pid' => 16,
                'path' => '0,2,16',
                'status' => 1,
            ),
            255 => 
            array (
                'id' => 262,
                'name' => '钙铁锌',
                'pid' => 16,
                'path' => '0,2,16',
                'status' => 1,
            ),
            256 => 
            array (
                'id' => 263,
                'name' => 'VD|维生素',
                'pid' => 16,
                'path' => '0,2,16',
                'status' => 1,
            ),
            257 => 
            array (
                'id' => 264,
                'name' => '益生菌',
                'pid' => 16,
                'path' => '0,2,16',
                'status' => 1,
            ),
            258 => 
            array (
                'id' => 265,
                'name' => '免疫力',
                'pid' => 16,
                'path' => '0,2,16',
                'status' => 1,
            ),
            259 => 
            array (
                'id' => 266,
                'name' => '德国爱他美',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            260 => 
            array (
                'id' => 268,
                'name' => '德国Hipp',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            261 => 
            array (
                'id' => 269,
                'name' => ' 德国Topfer',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            262 => 
            array (
                'id' => 270,
                'name' => '荷兰Nutrilon',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            263 => 
            array (
                'id' => 271,
                'name' => '荷兰Herobaby',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            264 => 
            array (
                'id' => 272,
                'name' => '尤妮佳',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            265 => 
            array (
                'id' => 273,
                'name' => '花王',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            266 => 
            array (
                'id' => 274,
                'name' => 'GOON大王天使',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            267 => 
            array (
                'id' => 275,
                'name' => '英国Cow&Gate',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            268 => 
            array (
                'id' => 276,
                'name' => ' 澳洲Aptamil',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            269 => 
            array (
                'id' => 277,
                'name' => '德国holle',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            270 => 
            array (
                'id' => 278,
                'name' => '英国Aptamil',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            271 => 
            array (
                'id' => 279,
                'name' => '授权行货惠氏启赋',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            272 => 
            array (
                'id' => 280,
                'name' => '港版美赞臣',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            273 => 
            array (
                'id' => 281,
                'name' => '授权行货爱他美',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            274 => 
            array (
                'id' => 282,
                'name' => '授权行货诺优能',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            275 => 
            array (
                'id' => 283,
                'name' => '授权行货 喜宝',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            276 => 
            array (
                'id' => 284,
                'name' => '美国MeadJohnson',
                'pid' => 10,
                'path' => '0,1,10',
                'status' => 1,
            ),
            277 => 
            array (
                'id' => 285,
                'name' => 'GOON大王维E',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            278 => 
            array (
                'id' => 286,
                'name' => ' Pampers帮宝适',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            279 => 
            array (
                'id' => 287,
                'name' => 'Singapore Huggies新加坡好奇',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            280 => 
            array (
                'id' => 288,
                'name' => 'Pampers care帮宝适棉柔',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            281 => 
            array (
                'id' => 289,
                'name' => 'Huggies Gold好奇金装',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            282 => 
            array (
                'id' => 290,
                'name' => 'Huggies platinum好奇铂金装',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            283 => 
            array (
                'id' => 291,
                'name' => 'Mamypoko 妈咪宝贝',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            284 => 
            array (
                'id' => 292,
                'name' => ' Libero丽贝乐',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            285 => 
            array (
                'id' => 293,
                'name' => 'Bella Baby Happy贝拉宝贝',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            286 => 
            array (
                'id' => 294,
                'name' => 'BioFities爱婴舒坦',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
            287 => 
            array (
                'id' => 295,
                'name' => ' BAMBO班博',
                'pid' => 11,
                'path' => '0,1,11',
                'status' => 1,
            ),
        ));
        
        
    }
}
