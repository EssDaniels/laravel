<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('users')->insert([
            'name' => "Dawid",
            'email' => 'ds@gmail.com',
            'password' => Hash::make('pass'),
            'lastname' => 'Skiba',
            'phone' => 654654654,
            'status' => 'Active',
            'pesel' => '89031201145',
            'type' => 'admin'

        ]);

        DB::table('users')->insert([
            'name' => "Klaudia",
            'email' => 'kk@gmail.com',
            'password' => Hash::make('pass'),
            'lastname' => 'Kistek',
            'phone' => 6969696969,
            'status' => 'Active',
            'pesel' => '92123100155',
            'type' => 'patient'

        ]);

        DB::table('users')->insert([
            'name' => "Krzyki",
            'email' => 'panda@gmail.com',
            'password' => Hash::make('pass'),
            'lastname' => 'Krzyki',
            'phone' => 6666666666,
            'status' => 'Active',
            'pesel' => '6666666666',
            'type' => 'doctor'

        ]);

        DB::table('specializations')->insert([
            'name' => 'oncolgy'
        ]);

        DB::table('specializations')->insert([
            'name' => 'surgeon'
        ]);

        DB::table('specializations')->insert([
            'name' => 'internist'
        ]);
    }
}
