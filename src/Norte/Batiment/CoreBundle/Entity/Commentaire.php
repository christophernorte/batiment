<?php

namespace Norte\Batiment\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Norte\Batiment\CoreBundle\Entity\Commentaire
 *
 * @ORM\Table(name="Commentaire")
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var text $text
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var boolean $isaffiche
     *
     * @ORM\Column(name="isaffiche", type="boolean", nullable=false)
     */
    private $isaffiche;

    /**
     * @var Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPhoto", referencedColumnName="id")
     * })
     */
    private $idphoto;

      

    /**
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate()
    {
	$this->date = new \DateTime("now");
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set isaffiche
     *
     * @param boolean $isaffiche
     */
    public function setIsaffiche($isaffiche)
    {
        $this->isaffiche = $isaffiche;
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
     * @param Norte\Batiment\CoreBundle\Entity\Photo $idphoto
     */
    public function setIdphoto(Norte\Batiment\CoreBundle\Entity\Photo $idphoto)
    {
        $this->idphoto = $idphoto;
    }

    /**
     * Get idphoto
     *
     * @return Norte\Batiment\CoreBundle\Entity\Photo
     */
    public function getIdphoto()
    {
        return $this->idphoto;
    }
    
    public function toJson() {
	return array('text' => $this->text, 'date' => $this->date->format('d-m-Y'));
    }
}