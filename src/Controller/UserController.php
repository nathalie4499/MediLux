<?php
namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController
{
    public function userLogin(Environment $twig)
    {
        return new Response(
            $twig->render(
                'User/userLogin.html.twig'
                )
            );
    }
    public function login(AuthenticationUtils $authUtils, Environment $twig)
    {
        $errors = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        
        return new Response(
            $twig->render('Security/login.html.twig',
                [
                    'last_username' => $authUtils->getLastUsername(),
                    'error' => $authUtils->getLastAuthenticationError()
                ]
                )
            );
    }
}

