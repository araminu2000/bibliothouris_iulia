<?php
namespace BibliothourisBundle\Service;

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
        return $bookRepository->getBookInfo();
    }

}