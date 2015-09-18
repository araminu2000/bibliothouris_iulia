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

    public function insert($name,$author)
    {
        $book = new Book();
        $book->setName($name);
        $book->setAuthor($author);

        $em = $this->manager;

        $em->persist($book);
        $em->flush();
    }

    public function update($bookId,$name,$author)
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        $book=$bookRepository->find($bookId);
        $book->setName($name);
        $book->setAuthor($author);


        $em = $this->manager;
        $em->persist($book);
        $em->flush();
    }

    public function findById($bookId)
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        $book=$bookRepository->findOneBy(['id'=>$bookId]);

        return $book;
    }

    public function doSomething()
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        $books=$bookRepository->findAll();
        return $books;


    }

    public function findBorrowedBooks($userId)
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
//        $books=$bookRepository->testDQL();
        $books=$bookRepository->findBorrowedBooks($userId);
        return $books;

    }

    public function returnBook($bookId)
    {
        $bookRepository = $this->manager->getRepository('BibliothourisBundle:Book');
        $book=$bookRepository->find($bookId);
        $book->setUser(null);
        //daca vreau alt id fac $user=findById(4); setUser($user);

        $em = $this->manager;
        $em->persist($book);
        $em->flush();

        return $book;
    }




}