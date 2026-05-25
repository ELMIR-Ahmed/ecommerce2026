<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{

    #[Route('/login', name: 'app_login')]
    public function login()
    {
        return $this->render('login.html.twig');
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile()
    {
        return $this->render('profile.html.twig');
    }

}
