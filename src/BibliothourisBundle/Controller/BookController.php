<?php

namespace BibliothourisBundle\Controller;

use BibliothourisBundle\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function indexAction()
    {
        /** @var BookService $bookService */
        $bookService = $this->get('bibliothouris.book_service');
        return new Response($bookService->getBookInfo());
    }
}