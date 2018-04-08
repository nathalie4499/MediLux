<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

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
}

