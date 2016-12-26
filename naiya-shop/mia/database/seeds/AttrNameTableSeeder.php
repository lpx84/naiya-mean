<?php

use Illuminate\Database\Seeder;

class AttrNameTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attr_name')->delete();
        
        \DB::table('attr_name')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '产地',
                'type' => 1,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '适用年龄',
                'type' => 1,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => '型号',
                'type' => 1,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => '体重',
                'type' => 1,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => '材质类型',
                'type' => 1,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => '价格',
                'type' => 1,
            ),
            6 => 
            array (
                'id' => 9,
                'name' => '包装类型',
                'type' => 1,
            ),
            7 => 
            array (
                'id' => 10,
                'name' => '适用肤质',
                'type' => 1,
            ),
            8 => 
            array (
                'id' => 11,
                'name' => '功效',
                'type' => 1,
            ),
            9 => 
            array (
                'id' => 12,
                'name' => '适用性别',
                'type' => 1,
            ),
            10 => 
            array (
                'id' => 13,
                'name' => '色系',
                'type' => 1,
            ),
            11 => 
            array (
                'id' => 14,
                'name' => '面料',
                'type' => 1,
            ),
            12 => 
            array (
                'id' => 15,
                'name' => '参考身高',
                'type' => 1,
            ),
            13 => 
            array (
                'id' => 16,
                'name' => '适用季节',
                'type' => 1,
            ),
            14 => 
            array (
                'id' => 17,
                'name' => '适用体重',
                'type' => 1,
            ),
            15 => 
            array (
                'id' => 18,
                'name' => '尺码详情',
                'type' => 1,
            ),
            16 => 
            array (
                'id' => 19,
                'name' => '原材料成分',
                'type' => 1,
            ),
            17 => 
            array (
                'id' => 20,
                'name' => '香味',
                'type' => 1,
            ),
            18 => 
            array (
                'id' => 21,
                'name' => '段位',
                'type' => 1,
            ),
            19 => 
            array (
                'id' => 22,
                'name' => '饮品种类',
                'type' => 1,
            ),
            20 => 
            array (
                'id' => 23,
                'name' => '适用部位',
                'type' => 1,
            ),
            21 => 
            array (
                'id' => 24,
                'name' => '糖果口味',
                'type' => 1,
            ),
            22 => 
            array (
                'id' => 25,
                'name' => '适用阶段',
                'type' => 1,
            ),
            23 => 
            array (
                'id' => 26,
                'name' => '辅食类别',
                'type' => 1,
            ),
            24 => 
            array (
                'id' => 27,
                'name' => '肉松种类',
                'type' => 1,
            ),
            25 => 
            array (
                'id' => 28,
                'name' => '肉泥种类',
                'type' => 1,
            ),
            26 => 
            array (
                'id' => 29,
                'name' => '饼干口味',
                'type' => 1,
            ),
            27 => 
            array (
                'id' => 30,
                'name' => '食品种类',
                'type' => 1,
            ),
        ));
        
        
    }
}
