<?php

namespace BibliothourisBundle\Controller;

use BibliothourisBundle\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function indexAction()
    {
        /** @var BookService $bookService */
        $bookService = $this->get('bibliothouris.book_service');


        //$bookService->insert();

       // $bookService->update();

       // var_dump($bookService->findByName());
        //die;


        return $this->render("BibliothourisBundle:Book:index.html.twig");
       // return new Response($bookService->getBookInfo());


    }


    public function insertAction()
    {

        return $this->render("BibliothourisBundle:Book:insert.html.twig");
        // return new Response($bookService->getBookInfo());


    }

    public function saveAction(Request $request)
    {
//        var_dump($request->get("name"));
//        die;
        $bookService = $this->get('bibliothouris.book_service');
        $data=$request->get("name");


        $bookService->insert($data);

        // $bookService->update();

        // var_dump($bookService->findByName());


        return $this->render("BibliothourisBundle:Book:save.html.twig");
        // return new Response($bookService->getBookInfo());


    }

    public function listAction()
    {
        $bookService = $this->get('bibliothouris.book_service');


       $books= $bookService->doSomething();


        return $this->render("BibliothourisBundle:Book:list.html.twig",
            [
                'books' => $books
            ]);


    }
    public function showAction()
    {
        $bookService = $this->get('bibliothouris.book_service');


        $books= $bookService->findById('2');


        return $this->render("BibliothourisBundle:Book:list.html.twig",
            [
                'books' => $books
            ]);


    }




}