<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    
    public function run()
    {
       User::truncate();


        User::create([
            'name'=>'ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>Hash::make('123456'),
        ]);
        User::create([
            'name'=>'ali',
            'email'=>'ali@gmail.com',
            'password'=>Hash::make('123456'),
        ]);
    }
}
