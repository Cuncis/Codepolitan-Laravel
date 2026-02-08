@extends('app')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 p-6 rounded-lg">
        <div class="flex flex-col md:flex-row md:space-x-6">
            <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="w-full md:w-1/3 rounded-md mb-4 md:mb-0">
            <div class="md:flex-1">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-2xl font-bold">{{ $movie['title'] }}</h2>
                    <div class="flex gap-2">
                        <a href="{{ route('movie.edit', $movieId) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-green-700 transition">Edit</a>
                        <form id="delete-form-{{ $movieId }}" method="POST" action="{{ route('movie.destroy', $movieId) }}"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="{{ route('movie.destroy', $movieId) }}"
                            onclick="event.preventDefault(); confirm('Are you sure?'); document.getElementById('delete-form-{{ $movieId }}').submit();"
                            class="bg-red-600 p-1 rounded hover:bg-red-500">
                            Remove
                        </a>
                    </div>
                </div>
                <p class="text-gray-400 mb-4">Release Date: {{ $movie['release_date'] }}</p>
                <p class="text-gray-300 mb-6">{{ $movie['description'] ?? 'No description available.' }}</p>

                @if(!empty($movie['genres']))
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-white mb-3">Genres</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($movie['genres'] as $genre)
                                <span
                                    class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium hover:bg-blue-700 transition">
                                    {{ $genre }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(!empty($movie['cast']))
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-white mb-3">Cast</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($movie['cast'] as $actor)
                                <div class="bg-gray-700 px-4 py-2 rounded-lg text-gray-100 text-sm hover:bg-gray-600 transition">
                                    {{ $actor }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('movie.index') }}" class="text-blue-500 hover:underline">Back to Movies</a>
        </div>
    </div>
@endsection