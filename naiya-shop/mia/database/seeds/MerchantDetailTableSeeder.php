<?php

use Illuminate\Database\Seeder;

class MerchantDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('merchant_detail')->delete();
        
        \DB::table('merchant_detail')->insert(array (
            0 => 
            array (
                'mid' => 1,
                'name' => '左霄红',
                'email' => '469306621@qq.com',
                'phone' => '13752295335',
                'sex' => 1,
                'cid_no' => '142402190009878765',
                'cid_img' => '1/1467940568370642.jpg',
                'create_at' => 1467940567,
                'update_at' => 1467940567,
            ),
        ));
        
        
    }
}
