<?php

namespace BibliothourisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 *
 * @package Cegeka\Asil\ApiBundle\Entity
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

}