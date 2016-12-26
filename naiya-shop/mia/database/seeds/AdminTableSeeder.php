<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin')->delete();
        
        \DB::table('admin')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'feng',
                'password' => '$2y$10$x2TuEaVKpiq5szis5EVb6uE8eJhVlJvbx8MxFBa100zNGodFzPAN2',
                'header' => 'default.jpg',
                'status' => 1,
                'create_at' => 1466839522,
                'token' => '7Kd7lG50w5CaIaZWBgJugeEQFwQsHppXSKJJdRfZuyd6KhLUCP',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'ming',
                'password' => '$2y$10$wMZcZBQZTLMMlMTagkPtVOtfTGBlE1qLhxHPKjJ1SKPSpcx6QXXzq',
                'header' => 'default.jpg',
                'status' => 1,
                'create_at' => 1466839522,
                'token' => 'EsHMbmilYNP27MdteeXyxuT86vpR9IIlbFdKKwa9bT0txkW2oQ',
            ),
            2 => 
            array (
                'id' => 4,
                'username' => 'admin',
                'password' => '$2y$10$4Rd.l.FO3o3H1.8kQ0F7vOBOnIuOYiNQ6ZI24IfKvHi1tE1mlS/tK',
                'header' => 'default.jpg',
                'status' => 1,
                'create_at' => 1467688105,
                'token' => 'oIuZ3KfMuUgajgraxS9KdFxVl4KvVZpz4E3LWYSGPxgEWpwtAt',
            ),
            3 => 
            array (
                'id' => 6,
                'username' => '111',
                'password' => '$2y$10$v5cNla0ME2XP7YpnJGYudurGRf6zZQngoKHD3oXZMOLaAj9l/XlTu',
                'header' => '20160705/1467688889165787.jpg',
                'status' => 1,
                'create_at' => 1467688519,
                'token' => 'kn8IzUSm9D6LDH9y3WzYzv585yaBjSOFpt8sOgeSvRGeM9Dgo7',
            ),
        ));
        
        
    }
}
