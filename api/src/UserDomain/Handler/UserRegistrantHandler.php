<?php

namespace App\UserDomain\Handler;

use App\UserDomain\Dto\NewUser;
use App\UserDomain\Infrastructure\Doctrine\Entity\User;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserRegistrantHandler implements MessageHandlerInterface
{
    public function __invoke(NewUser $user): NewUser
    {

    }

    public function handle($data): User
    {
        return new User();
    }
}
