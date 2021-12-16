<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_fname' => "admin",
            'user_lname' => "",
            'user_email' => "admin@user.com",
            'user_pass' => Hash::make('123'),
            'user_isadmin' => 1
        ]);
        User::factory()->count(25)->create();
    }
}
