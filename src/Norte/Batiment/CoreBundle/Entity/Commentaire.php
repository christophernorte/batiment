<?php

namespace Norte\Batiment\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Commentaire
 *
 * @ORM\Table(name="Commentaire", indexes={@ORM\Index(name="idPhoto", columns={"idPhoto"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;
    /**
     * @var boolean
     *
     * @ORM\Column(name="isaffiche", type="boolean", nullable=false)
     */
    private $isaffiche = false;
    /**
     * @var \Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo", inversedBy="userCommentaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPhoto", referencedColumnName="id")
     * })
     */
    private $idphoto;
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
    
    public function getText()
    {
	    return $this->text;
    }
    public function getDate()
    {
	    return $this->date;
    }
    public function setText($text)
    {
	    $this->text = $text;
    }
    public function setDate(\DateTime $date)
    {
	    $this->date = $date;
    }
}