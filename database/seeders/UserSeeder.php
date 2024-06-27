<?php

namespace Database\Seeders;

// database/seeders/UserSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Konselor',
                'email' => 'konselor@gmail.com',
                'password' => bcrypt('konselor123'),
                'role' => 'konselor'
            ],
            //[
            //'name' => 'Regular User',
            //'email' => 'user@example.com',
            //'password' => bcrypt('password'),
            //'role' => 'user'
            //],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }        
            
    }
}
