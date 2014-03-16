<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 */
class Commentaire
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $isaffiche;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \norte\adminBatimentBundle\Entity\Photo
     */
    private $idphoto;


    /**
     * Set text
     *
     * @param string $text
     * @return Commentaire
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Commentaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set isaffiche
     *
     * @param boolean $isaffiche
     * @return Commentaire
     */
    public function setIsaffiche($isaffiche)
    {
        $this->isaffiche = $isaffiche;

        return $this;
    }

    /**
     * Get isaffiche
     *
     * @return boolean 
     */
    public function getIsaffiche()
    {
        return $this->isaffiche;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idphoto
     *
     * @param \norte\adminBatimentBundle\Entity\Photo $idphoto
     * @return Commentaire
     */
    public function setIdphoto(\norte\adminBatimentBundle\Entity\Photo $idphoto = null)
    {
        $this->idphoto = $idphoto;

        return $this;
    }

    /**
     * Get idphoto
     *
     * @return \norte\adminBatimentBundle\Entity\Photo 
     */
    public function getIdphoto()
    {
        return $this->idphoto;
    }
}
