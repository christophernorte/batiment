<?php

namespace norte\adminBatimentBundle\Entity;

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
    private $isaffiche;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \norte\adminBatimentBundle\Entity\Photo
     *
     * @ORM\ManyToOne(targetEntity="norte\adminBatimentBundle\Entity\Photo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPhoto", referencedColumnName="id")
     * })
     */
    private $idphoto;


}
