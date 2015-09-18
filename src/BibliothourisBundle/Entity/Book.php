<?php

namespace BibliothourisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 *
 *
 * @ORM\Entity(repositoryClass="BibliothourisBundle\Repository\BookRepository")
 * @ORM\Table(name="book")
 */
class Book extends BaseEntity
{
    /**
     * @var string
     * @ORM\Column(type="string", name="name", nullable=true)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string", name="author", nullable=true)
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="borrowedBooks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }





}