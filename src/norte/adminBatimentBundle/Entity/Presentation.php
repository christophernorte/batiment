<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presentation
 */
class Presentation
{
    /**
     * @var string
     */
    private $textacceuil;

    /**
     * @var boolean
     */
    private $id;


    /**
     * Set textacceuil
     *
     * @param string $textacceuil
     * @return Presentation
     */
    public function setTextacceuil($textacceuil)
    {
        $this->textacceuil = $textacceuil;

        return $this;
    }

    /**
     * Get textacceuil
     *
     * @return string 
     */
    public function getTextacceuil()
    {
        return $this->textacceuil;
    }

    /**
     * Get id
     *
     * @return boolean 
     */
    public function getId()
    {
        return $this->id;
    }
}
