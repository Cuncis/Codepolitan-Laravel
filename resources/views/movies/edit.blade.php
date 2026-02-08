@extends('app')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-white">Edit Movie</h2>
        <form action="{{ route('movie.update', $movieId) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-gray-300 mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 rounded-lg bg-gray-700 text-white"
                    value="{{ $movie['title'] }}" required>
            </div>
            <div>
                <label for="release_date" class="block text-gray-300 mb-2">Release Date</label>
                <input type="date" name="release_date" id="release_date"
                    class="w-full p-2 rounded-lg bg-gray-700 text-white" value="{{ $movie['release_date'] }}" required>
            </div>
            <div>
                <label for="description" class="block text-gray-300 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full p-2 rounded-lg bg-gray-700 text-white"
                    required>{{ $movie['description'] }}</textarea>
            </div>
            <div>
                <label for="image" class="block text-gray-300 mb-2">Image URL</label>
                <input type="url" name="image" id="image" class="w-full p-2 rounded-lg bg-gray-700 text-white"
                    value="{{ $movie['image'] }}" required>
            </div>
            <div>
                <label for="genres" class="block text-gray-300 mb-2">Genres (comma separated)</label>
                <input type="text" name="genres" id="genres" class="w-full p-2 rounded-lg bg-gray-700 text-white"
                    value="{{ $movie['genres'] }}">
            </div>
            <div>
                <label for="cast" class="block text-gray-300 mb-2">Cast (comma separated)</label>
                <input type="text" name="cast" id="cast" class="w-full p-2 rounded-lg bg-gray-700 text-white"
                    value="{{ $movie['cast'] }}">
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Add
                    Movie</button>
            </div>
        </form>
        <div class="mt-6">
            <a href="{{ route('movie.index') }}" class="text-blue-500 hover:underline">Back to Movies</a>
        </div>
    </div>
@endsection