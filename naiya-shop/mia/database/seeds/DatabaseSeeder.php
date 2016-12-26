<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call('UserTableSeeder');
        $this->call('MerchantTableSeeder');
        $this->call('AdminTableSeeder');
        $this->call('AttrNameTableSeeder');
        $this->call('AttrValueTableSeeder');
        $this->call('BrandTableSeeder');
        $this->call('CateTableSeeder');
        $this->call('HelpTableSeeder');
        $this->call('HelpCateTableSeeder');
        $this->call('MerchantDetailTableSeeder');
        $this->call('PaywayTableSeeder');
    }
}
