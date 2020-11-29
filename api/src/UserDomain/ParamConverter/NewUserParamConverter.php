<?php

namespace App\UserDomain\ParamConverter;

use App\UserDomain\Dto\NewUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NewUserParamConverter implements ParamConverterInterface
{
    public const CONVERTER_NAME = 'NewUser';

    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $request->attributes->set($configuration->getName(), $this->createNewUser($request));

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getName() === self::CONVERTER_NAME;
    }

    private function createNewUser(Request $request): NewUser
    {
        return NewUser::createDto(
            $request->get('email'),
            $request->get('password'),
            $request->get('repeated_password'),
            $request->get('country'),
        );
    }

//    private function createUserDto(Request $request): User
//    {
//        $user = new CreateUser();
//
//        return $user
//            ->setEmail($request->get('email'))
//            ->setPassword($this->encoder->encodePassword($user, $request->get('password')))
//            ->setRoles([])
//            ->setCountryOfOrigin($request->get('country'))
//            ;
//    }
//
//    private function createUser(Request $request): User
//    {
//        $user = new CreateUser();
//
//        return $user
//            ->setEmail($request->get('email'))
//            ->setPassword($this->encoder->encodePassword($user, $request->get('password')))
//            ->setRoles([])
//            ->setCountryOfOrigin($request->get('country'))
//        ;
//    }
}
