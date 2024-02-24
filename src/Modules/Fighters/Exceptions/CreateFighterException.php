<?php

declare(strict_types=1);

namespace Modules\Fighters\Exceptions;

use Modules\CustomException;

class CreateFighterException extends CustomException
{
    public static function userDoesNotHavePermission(): self
    {
        return new self('User does not have permission to create a fighter.', 403);
    }
}
