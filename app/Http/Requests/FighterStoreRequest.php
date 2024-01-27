<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FighterStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // add permission
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female',
            'nationality' => 'required|string|max:255',
            'fighting_out_of' => 'required|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'image_url' => 'nullable|url|max:2048',
            'wins' => 'required|integer|min:0',
            'losses' => 'required|integer|min:0',
            'draws' => 'required|integer|min:0',
            'nicknames' => 'nullable|array',
            'nicknames.*' => 'string|max:255',
            'tapology_url' => 'nullable|url|max:2048',
            'cagematch_url' => 'nullable|url|max:2048',
            'ufc_url' => 'nullable|url|max:2048',
        ];
    }
}
