<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;

class MovieController extends Controller implements HasMiddleware
{
    public $movies;

    public function __construct()
    {
        $this->movies = [];

        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [
                'title' => 'Movie Title from Controller ' . ($i + 1),
                'director' => 'Director ' . ($i + 1),
                'year' => 2000 + $i,
            ];
        }
    }

    public static function middleware()
    {
        // return [
        //     'isAuth',
        //     new Middleware('isMember', only: ['show']),
        // ];
    }
    public function index()
    {
        $movies = $this->movies;

        return view('movies.index', compact('movies'))->with('pageTitle', 'List of movies');
    }
    //     return response()->json([
    //         'movies' => $this->movies,
    //         "message" => "List of movies"
    //     ], 200);
    // }

    public function show($id)
    {
        // return $this->movies[$id] ?? 'Movie not found';
        $movie = $this->movies[$id] ?? null;
        return view('movies.show', ['movie' => $movie, 'pageTitle' => 'Movie Details']);
    }

    public function store()
    {
        $this->movies[] = [
            'title' => request('title'),
            'director' => request('director'),
            'year' => request('year'),
        ];

        return $this->movies;
    }

    public function update($id)
    {
        $this->movies[$id]['title'] = request('title');
        $this->movies[$id]['director'] = request('director');
        $this->movies[$id]['year'] = request('year');

        return $this->movies;
    }

    public function destroy($id)
    {
        unset($this->movies[$id]);
        // $this->movies = array_values($this->movies); // Reindex the array

        return $this->movies;
    }
}
