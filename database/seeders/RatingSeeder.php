<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = DB::table('movies')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();

        $ratings = [];

        foreach ($users as $userId) {
            foreach ($movies as $movieId) {
                $ratings[] = [
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'rating' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('ratings')->insert($ratings);
    }
}
