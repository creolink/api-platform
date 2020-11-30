<?php

namespace App\UserDomain\Handler;

use App\UserDomain\Dto\NewUser;
use App\MealDomain\Adapter\UserAdapter;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRegistrantHandler implements MessageHandlerInterface
{
    public function __invoke(NewUser $user): NewUser
    {

    }

    public function handle($data)
    {
    }
}
