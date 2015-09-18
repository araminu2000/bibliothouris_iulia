<?php

namespace BibliothourisBundle\Controller;

use BibliothourisBundle\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function indexAction()
    {
        /** @var UserService $userService */
       // $userService = $this->get('bibliothouris.user_service');


        return $this->render("BibliothourisBundle:User:index.html.twig");


    }


}