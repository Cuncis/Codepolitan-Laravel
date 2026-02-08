<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Inception',
                'slug' => 'inception',
            ],
            [
                'title' => 'The Dark Knight',
                'slug' => 'the-dark-knight',
            ],
            [
                'title' => 'Interstellar',
                'slug' => 'interstellar',
            ],
            [
                'title' => 'The Matrix',
                'slug' => 'the-matrix',
            ],
            [
                'title' => 'Pulp Fiction',
                'slug' => 'pulp-fiction',
            ],
        ];

        DB::table('movies')->insert(array_map(function ($movie) {
            return array_merge($movie, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $movies));
    }
}
