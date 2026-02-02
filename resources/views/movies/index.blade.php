@extends('app')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        @foreach ($movies as $movie)
            <a href="{{ route('movie.show', $loop->index) }}">
                <div class="bg-gray-800 p-4 rounded-lg relative group">
                    <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="w-full rounded-md">
                    <h3 class="text-lg mt-2">{{ $movie['title'] }}</h3>
                    <p class="text-sm text-gray-400">{{ $movie['release_date'] }}</p>

                    <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
                        <button class="bg-green-600 p-1 rounded hover:bg-green-500">
                            Edit
                        </button>
                        <button class="bg-red-600 p-1 rounded hover:bg-red-500">
                            Remove
                        </button>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection