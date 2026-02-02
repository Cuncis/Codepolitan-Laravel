<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


Route::get('/', action: function () {
    return view('app');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/main-movie', function () {
    $movies = [
        ['title' => 'Inception', 'director' => 'Christopher Nolan', 'year' => 2010],
        ['title' => 'The Matrix', 'director' => 'The Wachowskis', 'year' => 1999],
        ['title' => 'Interstellar', 'director' => 'Christopher Nolan', 'year' => 2014],
    ];
    return view('movies.index', compact('movies'));
});

$movies = [];

for ($i = 0; $i < 10; $i++) {
    $movies[] = [
        'title' => 'Movie Title ' . ($i + 1),
        'director' => 'Director ' . ($i + 1),
        'year' => 2000 + $i,
    ];
}

Route::group([
    'prefix' => 'movie',
    'as' => 'movie.'
], function () use ($movies) {

    Route::get('/', [MovieController::class, 'index'])->name('index');

    Route::get('/{id}', [MovieController::class, 'show'])->name('show');

    Route::post('/', [MovieController::class, 'store']);

    Route::put('/{id}', [MovieController::class, 'update']);
    Route::patch('/{id}', [MovieController::class, 'update']);

    Route::delete('/{id}', [MovieController::class, 'destroy']);
});


Route::get('/pricing', function () {
    return 'Please buy a membership to access detailed movie information.';
});

Route::get('/login', function () {
    return 'Please log in to access the movie details.';
})->name('login');


Route::get('/request', function (Request $request) {
    // $filtered = $request->collect()->map(function ($value) {
    //     return strtoupper($value);

    // });
    // $filtered = $request->collect()->only(['firstName', 'age']);
    // $input = $request->input('colors.*');

    // $data = $request->date('schedule', 'Y-m-d', 'Asia/Jakarta')->addDays(7)->addHours(5)->addMinutes(30)->diffForHumans();

    if ($request->has('name')) {
        $data = 'Hello, ' . $request->input('name') . ', ' . $request->input('age', 'unknown age') . ' years old.';
    } else {
        $data = 'Name parameter is missing.';
    }

    return $data;
});

Route::get('/response', function () {
    return response('OK', 200)->header('Content-Type', 'text/plain');
    // $data = [
    //     'status' => 'success',
    //     'message' => 'This is a sample response',
    // ];

    // return response()->json($data, 200)
    //     ->header('Content-Type', 'application/json')
    //     ->cookie('sample_cookie', 'sample_value', 60);
});

Route::get('/cache-control', function () {
    return Response::make('This response is cached for 10 minutes.', 200)
        ->header('Cache-Control', 'public, max-age=600');
});

Route::middleware('cache.headers:public;max_age=300;etag')->group(function () {
    // Route::get('/home', [HomeController::class, 'index']);
    Route::get('/privacy', function () {
        return 'Privacy Policy: Your data is safe with us.';
    });

    Route::get('/dashboard', function () {
        $user = 'John Doe';
        return response('Welcome to your dashboard, ' . $user . '!', 200)->cookie('user', $user);
    });

    Route::get('/logout', function () {
        return redirect()->action([HomeController::class, 'index']);

        // return redirect('/home')->withCookie(cookie()->forget('user'));
        // return response('You have been logged out successfully.', 200)
        //     ->cookie(cookie()->forget('user'));
    });
});

Route::get('/external', function () {
    return redirect()->away('https://www.google.com');
});