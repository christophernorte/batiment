<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 */
class Photo
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var boolean
     */
    private $isaffiche;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \norte\adminBatimentBundle\Entity\Rubrique
     */
    private $idrubrique;


    /**
     * Set url
     *
     * @param string $url
     * @return Photo
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Photo
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set isaffiche
     *
     * @param boolean $isaffiche
     * @return Photo
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Photo
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Photo
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * Set idrubrique
     *
     * @param \norte\adminBatimentBundle\Entity\Rubrique $idrubrique
     * @return Photo
     */
    public function setIdrubrique(\norte\adminBatimentBundle\Entity\Rubrique $idrubrique = null)
    {
        $this->idrubrique = $idrubrique;

        return $this;
    }

    /**
     * Get idrubrique
     *
     * @return \norte\adminBatimentBundle\Entity\Rubrique 
     */
    public function getIdrubrique()
    {
        return $this->idrubrique;
    }
}
