<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


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
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'laravel3pm@gmail.com',
            'password' => bcrypt('admin002'),
            'gender' => 'male',
            'image' => '',
            'user_type' => 'admin',
            'status' => 1
        ]);
    }
}
