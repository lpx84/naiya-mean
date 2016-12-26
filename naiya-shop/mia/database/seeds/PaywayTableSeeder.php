<?php

use Illuminate\Database\Seeder;

class PaywayTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payway')->delete();
        
        \DB::table('payway')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 1,
                'way' => 'alipay',
                'img' => 'payway-02.jpg',
                'name' => '支付宝',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 1,
                'way' => 'weixin',
                'img' => 'payway-01.jpg',
                'name' => '微信支付',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 2,
                'way' => 'ccb',
                'img' => 'pay_b02.png',
                'name' => '建行',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 2,
                'way' => 'cmb',
                'img' => 'pay_b03.png',
                'name' => '招行',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 2,
                'way' => 'icbc',
                'img' => 'pay_b01.png',
                'name' => '中国工商银行',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 2,
                'way' => 'abc',
                'img' => 'pay_b04.png',
                'name' => '中国农业银行',
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 2,
                'way' => 'boc',
                'img' => 'pay_b06.png',
                'name' => '中国银行',
            ),
        ));
        
        
    }
}
