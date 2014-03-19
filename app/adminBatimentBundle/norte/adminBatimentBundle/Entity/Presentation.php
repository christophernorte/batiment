<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presentation
 *
 * @ORM\Table(name="Presentation")
 * @ORM\Entity
 */
class Presentation
{
    /**
     * @var string
     *
     * @ORM\Column(name="textacceuil", type="text", nullable=false)
     */
    private $textacceuil;

    /**
     * @var boolean
     *
     * @ORM\Column(name="id", type="boolean")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
