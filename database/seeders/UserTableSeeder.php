<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'System Admin',
        	'email' => 'admin@admin.com',
        	'admin' => 1,
        	'password' => bcrypt('admin123'),
        ]);
    }
}
