<?php

namespace App\UserDomain\Controller;

use App\UserDomain\Dto\NewUser;
use App\UserDomain\Handler\UserRegistrantHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterUserController
{
    private UserRegistrantHandler $userRegistrantHandler;

    public function __construct(UserRegistrantHandler $userRegistrantHandler)
    {
        $this->userRegistrantHandler = $userRegistrantHandler;
    }

    public function __invoke(NewUser $data): NewUser
    {
        $user = $this->userRegistrantHandler->handle($data);

//        try {
//            $user = $this->userRepository->createNewUser($user);
//        } catch (UserNotCreatedException $e) {
//            throw new HttpException(Response::HTTP_BAD_REQUEST);
//        }

        return $data;
        //return new Response(sprintf('User %s successfully created', $user->getId()));
    }
}
