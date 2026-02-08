<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        // $movie = Movie::find(1)->ratings()->get();
        // $movie = Movie::find(1)->with('ratings')->get();

        // $movie = Movie::whereHas('ratings', function ($query) {
        //     $query->where('rating', '>=', 4);
        // })->get();

        $movie = Movie::with('ratings')->get()->filter(function ($movie) {
            return $movie->ratings->avg('rating') >= 2;
        })->map(function ($movie) {
            return [
                'title' => $movie->title,
                'average_rating' => $movie->ratings->avg('rating'),
            ];
        })->values();

        return $movie;
    }
}
