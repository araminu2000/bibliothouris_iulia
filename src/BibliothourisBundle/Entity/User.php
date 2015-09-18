<?php

namespace BibliothourisBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="user")
     **/
    private $borrowedBooks;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getBorrowedBooks()
    {
        return $this->borrowedBooks;
    }

    /**
     * @param mixed $borrowedBooks
     * @return $this
     */
    public function setBorrowedBooks($borrowedBooks)
    {
        $this->borrowedBooks = $borrowedBooks;
        return $this;
    }

}