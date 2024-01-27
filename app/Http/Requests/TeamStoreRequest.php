<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
{
    /**
     * @return array{name: array{0: string}}
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:teams'],
        ];
    }
}
