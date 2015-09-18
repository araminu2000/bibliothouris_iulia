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
        $name=$request->get("name");
        $author=$request->get("author");


        $bookService->insert($name,$author);

        // $bookService->update();

        // var_dump($bookService->findByName());

        return $this->listAction();
        //return $this->render("BibliothourisBundle:Book:save.html.twig");
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
    public function showAction(Request $request)
    {
        $bookService = $this->get('bibliothouris.book_service');
        $bookId=$request->get("bookId");


        $book= $bookService->findById($bookId);


        return $this->render("BibliothourisBundle:Book:show.html.twig",
            [
                'book' => $book
            ]);


    }

    public function editAction(Request $request)
    {
        if(!$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash(
                'notice',
                'You are not allowed!'
            );
            return $this->redirectToRoute("bibliothouris_index");
        }

        $bookService = $this->get('bibliothouris.book_service');
        $bookId=$request->get("bookId");
        $book= $bookService->findById($bookId);


        return $this->render("BibliothourisBundle:Book:edit.html.twig",
            [
                'book' => $book
            ]);



    }


    public function updateAction(Request $request)
    {

        $bookService = $this->get('bibliothouris.book_service');
        $bookId=$request->get("bookId");
        $name=$request->get("name");
        $author=$request->get("author");


        $bookService->update($bookId,$name,$author);

        return $this->redirectToRoute("bibliothouris_show",['bookId'=> $bookId]);

    }

    public function showBorrowedBooksAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $bookService = $this->get('bibliothouris.book_service');
        $books=$bookService->findBorrowedBooks($user->getId());

        return $this->render("BibliothourisBundle:Book:borrowedBooks.html.twig",
            [
                'books' => $books
            ]);


    }

    public function returnBookAction(Request $request)
    {


        $bookService = $this->get('bibliothouris.book_service');
        $bookId=$request->get("bookId");
        $books=$bookService->returnBook($bookId);
      //  $bookId=$books->getId();

        return $this->redirectToRoute("bibliothouris_borrowedBooks");






    }





}