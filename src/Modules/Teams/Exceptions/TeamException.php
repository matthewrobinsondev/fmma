<?php

namespace Modules\Teams\Exceptions;

use Modules\CustomException;

class TeamException extends CustomException
{
    public static function userCantHaveMultipleTeams(): self
    {
        return new self('User already has a team.', 403);
    }
}
