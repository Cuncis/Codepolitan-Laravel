<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bobsmith@gmail.com',
                'password' => bcrypt('abcdefg12345'),
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charliebrown@gmail.com',
                'password' => bcrypt('password456'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
