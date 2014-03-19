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
     * @var boolean
     *
     * @ORM\Column(name="id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="textacceuil", type="text", nullable=false)
     */
    private $textacceuil;

    public function getId()
    {
	    return $this->id;
    }

    public function getTextacceuil()
    {
	    return $this->textacceuil;
    }

    public function setId($id)
    {
	    $this->id = $id;
    }

    public function setTextacceuil($textacceuil)
    {
	    $this->textacceuil = $textacceuil;
    }


}
