<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = DB::table('categories')->get();
        // $categories = DB::table('categories')->select(['id', 'title', 'slug'])->get();
        // $categories = DB::table('categories')->whereIn('id', [1, 3, 5])->get();
        // $categories = DB::table('categories')->where('id', 2)->first();
        $categories = DB::table('categories')->where('id', 2)->select(['id', 'title'])->first();

        return $categories;
    }
}
