<?php

namespace norte\batimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="Commentaire")
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isaffiche", type="boolean")
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
     * @var \norte\batimentBundle\Entity\Photo
     *
     * @ORM\ManyToOne(targetEntity="norte\batimentBundle\Entity\Photo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPhoto", referencedColumnName="id")
     * })
     */
    private $idphoto;


}
