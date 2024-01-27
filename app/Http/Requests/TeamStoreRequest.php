<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Teams\Exceptions\TeamException;

class TeamStoreRequest extends FormRequest
{
    /**
     * @throws TeamException
     */
    public function authorize(): bool
    {
        /** @var User $user */
        $user = $this->user();
        if ($user->team()->exists()) {
            throw TeamException::userCantHaveMultipleTeams();
        }

        return true;
    }
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
