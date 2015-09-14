<?php
namespace BibliothourisBundle\Service;

use BibliothourisBundle\Entity\Book;
use BibliothourisBundle\Repository\BookRepository;
use Doctrine\Common\Persistence\ObjectManager;

class BookService
{
    /** @var  ObjectManager */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function getBookInfo()
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');

        //return $bookRepository->getBookInfo();
        return $bookRepository->createAction();
    }

    public function insert($data)
    {
        $book = new Book();
        $book->setName($data);

        $em = $this->manager;

        $em->persist($book);
        $em->flush();
    }

    public function update()
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        $book=$bookRepository->find(2);
        $book->setName('lalala');


        $em = $this->manager;
        $em->persist($book);
        $em->flush();
    }


    public function findByName()
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        //$book=$bookRepository->findBy(["name"=>"lalala"]);
        $book=$bookRepository->findByName("lalala");

        return $book;
    }

    public function doSomething()
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        $books=$bookRepository->findAll();
        return $books;


    }




}