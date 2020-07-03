<?php

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
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345'),
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 2,
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
		
		DB::table('users')->insert([
            'id' => 2,
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('12345'),
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 2,
        ]);
    }
}
