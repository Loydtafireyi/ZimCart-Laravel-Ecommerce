<?php

use App\SystemSetting;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemSetting::create([
        	'name' => 'Vannesa Cakes',
        	'description' => 'This is the best baking online shop in Zimbabwe',
        	'address' => '50 Rossal Road, Greendale Harare',
        	'tel' => '+263783044087',
        	'email' => 'loydtafireyi@gmail.com',
        	'slug' => 'company-info',
            'logo' => asset('frontend/img/logo.png'),
        ]);
    }
}
