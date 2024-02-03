<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '11482',
            'name' => 'ボット',
            'email' => 'i11482@nara.kosen-ac.jp',
            'password' => Hash::make('password'),
            'is_admin' => 1,
            'class' => '3I',
        ]);
    }
}
