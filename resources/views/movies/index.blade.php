<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Index</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>


    {{-- @for ($i = 0; $i < count($movies); $i++) <div>
        <h2>{{ $movies[$i]['title'] }}</h2>
        <p>Director: {{ $movies[$i]['director'] }}</p>
        <p>Year: {{ $movies[$i]['year'] }}</p>
        </div>

        @endfor --}}

        @foreach ($movies as $movie)
            {{-- <p class="{{ $movie['year'] < 2010 ? 'text-red-500' : 'text-green-500' }} ">
                Movie: {{ $movie['title'] }} - {{ $movie['year'] }}
            </p> --}}

            @include('partials._movie', ['movie' => $movie])
        @endforeach

        <p class="text-red-500 text-3xl">
            If this is black, Tailwind is NOT loaded
        </p>


        {{-- @forelse ($movies as $movie)
        <div>
            <h2>{{ $movie['title'] }}</h2>
            <p>Director: {{ $movie['director'] }}</p>
            <p>Year: {{ $movie['year'] }}</p>
        </div>
        @empty
        <h3>No movie found.</h3>
        @endforelse --}}

        {{-- {{ dd($config) }} --}}
</body>

</html>