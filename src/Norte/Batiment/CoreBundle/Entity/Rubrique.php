<?php

namespace Norte\Batiment\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Norte\Batiment\CoreBundle\Entity\Rubrique
 *
 * @ORM\Table(name="Rubrique")
 * @ORM\Entity
 */
class Rubrique {

	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string $nom
	 *
	 * @ORM\Column(name="nom", type="string", length=100, nullable=true)
	 */
	private $nom;

	/**
	 * @var text $commentaire
	 *
	 * @ORM\Column(name="commentaire", type="text", nullable=true)
	 */
	private $commentaire;

	/**
	 * @var string $adresse
	 *
	 * @ORM\Column(name="adresse", type="string", length=200, nullable=false)
	 */
	private $adresse;

	/**
	 * @var datetime $createdAt
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var datetime $updatedAt
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getCommentaire() {
		return $this->commentaire;
	}

	public function setCommentaire($commentaire) {
		$this->commentaire = $commentaire;
	}

	public function getAdresse() {
		return $this->adresse;
	}

	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}

	public function getCreatedAt() {
		return $this->createdAt;
	}

	public function setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
	}

	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	public function setUpdatedAt($updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function toJson() {
		return array('nom' => $this->nom, 'commentaire' => $this->commentaire, 'id' => $this->id);
	}

	public function __toString() {
		return __CLASS__;
	}

}