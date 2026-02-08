<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = DB::table('categories')->get();
        // $categories = DB::table('categories')->select(['id', 'title', 'slug'])->get();
        // $categories = DB::table('categories')->whereIn('id', [1, 3, 5])->get();
        // $categories = DB::table('categories')->where('id', 2)->first();
        // $categories = DB::table('categories')->where('id', 2)->select(['id', 'title'])->first();
        $categories = Category::all();
        // $categories = Category::select(['id', 'title', 'slug'])->get();
        // $categories = Category::whereIn('id', [1, 3, 5])->get();

        return $categories;
    }

    public function store(Request $request)
    {
        // $category = DB::table('categories')->insert([
        //     'title' => $request['title'],
        //     'slug' => Str::of($request['title'])->slug('-'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $category = new Category();
        // $category->title = $request['title'];
        // $category->slug = Str::of($request['title'])->slug('-');
        // $category->save();

        // $category = Category::create([
        //     'title' => $request['title'],
        //     'slug' => Str::of($request['title'])->slug('-'),
        // ]);

        $categories = Category::insert([
            [
                'title' => 'Horror',
                'slug' => Str::of('Horror')->slug('-'),
            ],
            [
                'title' => 'Romance',
                'slug' => Str::of('Romance')->slug('-'),
            ],
            [
                'title' => 'Sci-Fi',
                'slug' => Str::of('Sci-Fi')->slug('-'),
            ],
        ]);

        return $categories;
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request['title'];
        $category->slug = Str::of($request['title'])->slug('-');
        $category->updated_at = now();
        $category->save();
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully.']);
    }
}
