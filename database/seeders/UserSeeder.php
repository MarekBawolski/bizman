<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('users')->insert([
            'name' => 'Wojtek',
            'email' => 'wojtek@bizman.pl',
            'password' => Hash::make('password'),
        ]);
         DB::table('users')->insert([
            'name' => 'Marek',
            'email' => 'marek@bizman.pl',
            'password' => Hash::make('password'),
        ]);
         DB::table('users')->insert([
            'name' => 'Albert',
            'email' => 'albert@bizman.pl',
            'password' => Hash::make('password'),
        ]);
         DB::table('users')->insert([
            'name' => 'Michał',
            'email' => 'michal@bizman.pl',
            'password' => Hash::make('password'),
        ]);
    }
}
