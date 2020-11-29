<?php

namespace App\UserDomain\Exception;

class InvalidRepeatedPasswordException extends \RuntimeException
{
    private const INVALID_REPEATED_PASSWORD = 'Password and repeated password are not the same!';

    public function __construct()
    {
        parent::__construct(self::INVALID_REPEATED_PASSWORD);
    }
}
