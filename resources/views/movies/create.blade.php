@extends('app')

@section('content')
    {{-- @if (!empty($errors->all()))
    <div class="max-w-4xl mx-auto mb-6 bg-red-600 p-4 rounded-lg">
        <ul class="list-disc list-inside text-white">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="max-w-4xl mx-auto bg-gray-800 p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-white">Add New Movie</h2>
        <form id="movieForm" action="{{ route('movie.store') }}" method="POST" class="space-y-4" novalidate>
            @csrf
            <div>
                <label for="title" class="block text-gray-300 mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 rounded-lg bg-gray-700 text-white @error('title')
                    border-red-500
                @enderror">
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <p id="error-title" class="mt-1 text-red-500 text-sm hidden"></p>
            </div>
            <div>
                <label for="release_date" class="block text-gray-300 mb-2">Release Date</label>
                <input type="date" name="release_date" id="release_date"
                    class="w-full p-2 rounded-lg bg-gray-700 text-white" required>
                <p id="error-release_date" class="mt-1 text-red-500 text-sm hidden"></p>
            </div>
            <div>
                <label for="description" class="block text-gray-300 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full p-2 rounded-lg bg-gray-700 text-white"
                    required></textarea>
                <p id="error-description" class="mt-1 text-red-500 text-sm hidden"></p>
            </div>
            <div>
                <label for="image" class="block text-gray-300 mb-2">Image URL</label>
                <input type="url" name="image" id="image" class="w-full p-2 rounded-lg bg-gray-700 text-white" required>
                <p id="error-image" class="mt-1 text-red-500 text-sm hidden"></p>
            </div>
            <div>
                <label for="genres" class="block text-gray-300 mb-2">Genres (comma separated)</label>
                <input type="text" name="genres" id="genres" class="w-full p-2 rounded-lg bg-gray-700 text-white">
                <p id="error-genres" class="mt-1 text-red-500 text-sm hidden"></p>
            </div>
            <div>
                <label for="cast" class="block text-gray-300 mb-2">Cast (comma separated)</label>
                <input type="text" name="cast" id="cast" class="w-full p-2 rounded-lg bg-gray-700 text-white">
                <p id="error-cast" class="mt-1 text-red-500 text-sm hidden"></p>
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Add
                    Movie</button>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('movieForm');
                const fields = [
                    { id: 'title', required: true, message: 'Title is required.' },
                    { id: 'release_date', required: true, message: 'Release date is required.' },
                    { id: 'description', required: true, message: 'Description is required.' },
                    { id: 'image', required: true, message: 'Image URL is required and must be a valid URL.' },
                    { id: 'genres', required: true, message: 'Enter at least one genre.' },
                    { id: 'cast', required: true, message: 'Enter at least one cast member.' },
                ];

                function setError(el, msg) {
                    el.classList.add('border-2', 'border-red-500');
                    const err = document.getElementById('error-' + el.id);
                    if (err) {
                        err.textContent = msg;
                        err.classList.remove('hidden');
                    }
                }

                function clearError(el) {
                    el.classList.remove('border-2', 'border-red-500');
                    const err = document.getElementById('error-' + el.id);
                    if (err) {
                        err.textContent = '';
                        err.classList.add('hidden');
                    }
                }

                fields.forEach(f => {
                    const el = document.getElementById(f.id);
                    if (!el) return;
                    el.addEventListener('input', () => clearError(el));
                });

                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    let hasError = false;
                    fields.forEach(f => {
                        const el = document.getElementById(f.id);
                        if (!el) return;
                        clearError(el);
                        const val = el.value && el.value.trim();
                        if (f.required && !val) {
                            setError(el, f.message);
                            hasError = true;
                            return;
                        }
                        if (el.type === 'url' && val) {
                            try {
                                new URL(val);
                            } catch (err) {
                                setError(el, 'Please enter a valid URL.');
                                hasError = true;
                            }
                        }
                        // special validation for comma-separated lists
                        if ((el.id === 'genres' || el.id === 'cast') && val) {
                            const items = val.split(',').map(s => s.trim()).filter(Boolean);
                            if (items.length === 0) {
                                setError(el, f.message);
                                hasError = true;
                            }
                        }
                    });

                    if (!hasError) {
                        form.submit();
                    }
                });
            });
        </script>
        <div class="mt-6">
            <a href="{{ route('movie.index') }}" class="text-blue-500 hover:underline">Back to Movies</a>
        </div>
    </div>
@endsection