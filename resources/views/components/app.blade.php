<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieApp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-white">
    <x-partials.header></x-partials.header>

    <div class="min-h-screen flex">
        <div class="flex">
            <aside class="w-1/4 p-5 border-r border-gray-700">
                {{ $sidebar }}
            </aside>
            <main class="w-3/4 p-5">
                {{ $main }}
            </main>
        </div>
    </div>
</body>

</html>