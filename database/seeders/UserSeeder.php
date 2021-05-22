<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'login' => 'admin', 
            'email' => 'admin@admin.com', 
            'email_verified_at' => NULL, 
            'status' => 1,
            'password' => Hash::make('password'),
            'two_factor_secret' => NULL,
            'two_factor_recovery_codes' => NULL,
            'remember_token' => NULL,
            'created_at' => date("Y-m-d H:i:s"), 
            'updated_at' => date("Y-m-d H:i:s")
        ]);

    }
}
