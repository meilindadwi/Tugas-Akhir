<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use SebastianBergmann\Type\VoidType;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $userData =[
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'konselor',
                'email'=>'konselor@gmail.com',
                'role'=>'konselor',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('123456')
            ],
        ];
        
        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
