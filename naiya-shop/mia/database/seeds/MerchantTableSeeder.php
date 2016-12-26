<?php

use Illuminate\Database\Seeder;

class MerchantTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('merchant')->delete();
        
        \DB::table('merchant')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'fengtest',
                'password' => '$2y$10$hrpwf3QSTTZ3mz3aIXtige0QTCxH3KgIsNjl1.PY37EDXAy3Lg1Dm',
                'name' => '宝宝之家',
                'account' => '0.00',
                'logo' => '1467940567994502.jpg',
                'desc' => '宝宝之家',
                'token' => '4SoQc2EP0prxLvM33vJeOAPkZcqJtGtr4IGoj6ACbOOoS8jvSe',
                'create_at' => 1467940567,
                'update_at' => 1467940567,
                'status' => 1,
                'is_real_check' => 0,
            ),
        ));
        
        
    }
}
