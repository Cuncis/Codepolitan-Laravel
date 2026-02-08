<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'description' => 'required|string',
            'image' => 'required|url',
            'genres' => 'required|string',
            'cast' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul film wajib diisi.',
            'release_date.required' => 'Tanggal rilis wajib diisi.',
            'description.required' => 'The movie description is required.',
            'image.required' => 'The movie image URL is required.',
            'genres.required' => 'At least one genre is required.',
            'cast.required' => 'At least one cast member is required.',
        ];
    }
}
