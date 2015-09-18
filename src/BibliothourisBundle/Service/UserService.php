<?php
namespace BibliothourisBundle\Service;

use BibliothourisBundle\Entity\User;
use BibliothourisBundle\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;


class UserService
{
    /** @var  ObjectManager */
    protected $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }



}