<?php

namespace Database\Seeders;

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
        	'name' => 'ZimCart',
        	'description' => 'The best open source platform in Zimbabwe',
        	'address' => '50 Rossal Road, Greendale Harare',
        	'tel' => '+263783044087',
        	'email' => 'loydtafireyi@gmail.com',
        	'slug' => 'company-info',
            'logo' => asset('frontend/img/logo.png'),
        ]);
    }
}
