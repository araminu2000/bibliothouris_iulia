<?php
namespace BibliothourisBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class BookRepository extends EntityRepository
{
    public function getBookInfo()
    {
        return $this->findAll();
    }

    public function testDQL()
    {
        $query = $this->getEntityManager()->createQuery("
            SELECT b
            FROM BibliothourisBundle:Book b
            JOIN b.user u
            WHERE u.id = :userId
        ");

        $query->setParameter('userId', 1);

        $result = $query->getResult();

        echo '<pre>';
        var_dump($result);die;
    }

    public function findBorrowedBooks($userId)
    {
        $query = $this
                    ->getEntityManager()
                    ->getRepository('BibliothourisBundle:Book')
                    ->createQueryBuilder('b')
                    ->join('b.user','u')
                    ->where('u.id = :userId');

        $query->setParameter('userId',$userId);

        $result = $query->getQuery()->getResult();

        return $result;
    }



}