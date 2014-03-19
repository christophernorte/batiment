<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="Contact")
 * @ORM\Entity
 */
class Contact
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
     * @ORM\Column(name="titre", type="string", length=200, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=200, nullable=false)
     */
    private $information;

    
    public function getId()
    {
	    return $this->id;
    }

    public function getTitre()
    {
	    return $this->titre;
    }

    public function getInformation()
    {
	    return $this->information;
    }

    public function setId($id)
    {
	    $this->id = $id;
    }

    public function setTitre($titre)
    {
	    $this->titre = $titre;
    }

    public function setInformation($information)
    {
	    $this->information = $information;
    }



}
