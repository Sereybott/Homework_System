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
        $j = 1;
        $classes = array('C','I','M','E','S');
        foreach($classes as $class){
            for($i=1;$i<=5;$i++){
                DB::table('class')->insert([
                    'name' => (string)$i.(string)$class
                ]);
                DB::table('users')->insert([
                    'stu_id' => (string)$i.(string)$class,
                    'name' => (string)$i.(string)$class.' Admin',
                    'email' => (string)$i.(string)$class.'admin',
                    'password' => Hash::make('password'),
                    'is_admin' => 1,
                    'class' => $j++,
                    
                ]);
            }
        }
        
        // DB::table('users')->insert([
        //     'stu_id' => '00000',
        //     'name' => '3I Admin',
        //     'email' => 'admin',
        //     'password' => Hash::make('password'),
        //     'is_admin' => 1,
        //     'class' => '3I',
        // ]);
    }
}
