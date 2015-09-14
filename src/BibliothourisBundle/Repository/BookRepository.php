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




}