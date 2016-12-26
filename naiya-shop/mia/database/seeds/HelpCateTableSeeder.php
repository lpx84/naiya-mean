<?php

use Illuminate\Database\Seeder;

class HelpCateTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('help_cate')->delete();
        
        \DB::table('help_cate')->insert(array (
            0 => 
            array (
                'id' => 10,
                'name' => '帮助中心',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 11,
                'name' => '奶牙',
                'pid' => 0,
                'path' => '0',
                'status' => 1,
            ),
            2 => 
            array (
                'id' => 12,
                'name' => '玩转官网',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            3 => 
            array (
                'id' => 13,
                'name' => '账户相关',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            4 => 
            array (
                'id' => 14,
                'name' => '支付方式',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            5 => 
            array (
                'id' => 15,
                'name' => '订单修改',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            6 => 
            array (
                'id' => 16,
                'name' => '商品配送',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            7 => 
            array (
                'id' => 17,
                'name' => '售后服务',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            8 => 
            array (
                'id' => 18,
                'name' => '常见问题',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            9 => 
            array (
                'id' => 19,
                'name' => '服务条款',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            10 => 
            array (
                'id' => 20,
                'name' => '奶牙App',
                'pid' => 10,
                'path' => '0,10',
                'status' => 1,
            ),
            11 => 
            array (
                'id' => 21,
                'name' => '关于奶牙',
                'pid' => 11,
                'path' => '0,11',
                'status' => 1,
            ),
        ));
        
        
    }
}
