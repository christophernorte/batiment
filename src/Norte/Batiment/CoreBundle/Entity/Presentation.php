<?php

namespace Norte\Batiment\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Norte\Batiment\CoreBundle\Entity\Presentation
 *
 * @ORM\Table(name="Presentation")
 * @ORM\Entity
 */
class Presentation {

	/**
	 * @var boolean $id
	 *
	 * @ORM\Column(name="id", type="boolean", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var text $textacceuil
	 *
	 * @ORM\Column(name="textacceuil", type="text", nullable=false)
	 */
	private $textacceuil;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getTextacceuil() {
		return $this->textacceuil;
	}

	public function setTextacceuil($textacceuil) {
		$this->textacceuil = $textacceuil;
	}

	public function __toString() {
		return __CLASS__;
	}

}