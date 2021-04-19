<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Alex Hales',
                'email' => 'alex@abc.com',
                'password' => Hash::make('12345678'),
                'age' => 25,
                'api_token' => Str::random(80),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'John Rhodes',
                'email' => 'john@abc.com',
                'password' => Hash::make('12345678'),
                'age' => 44,
                'api_token' => Str::random(80),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'David William',
                'email' => 'david@abc.com',
                'password' => Hash::make('12345678'),
                'age' => 32,
                'api_token' => Str::random(80),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
