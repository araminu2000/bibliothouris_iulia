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

}