<?php

namespace Norte\Batiment\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Norte\Batiment\CoreBundle\Entity\Photo
 *
 * @ORM\Table(name="Photo")
 * @ORM\Entity
 */
class Photo {

	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string $url
	 *
	 * @ORM\Column(name="url", type="string", length=200, nullable=false)
	 */
	private $url;

	/**
	 * @var text $commentaire
	 *
	 * @ORM\Column(name="commentaire", type="text", nullable=true)
	 */
	private $commentaire;

	/**
	 * @var boolean $isaffiche
	 *
	 * @ORM\Column(name="isaffiche", type="boolean", nullable=false)
	 */
	private $isaffiche;

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

	/**
	 * @var Rubrique
	 *
	 * @ORM\ManyToOne(targetEntity="Rubrique")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="idrubrique", referencedColumnName="id")
	 * })
	 */
	private $idrubrique;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getUrl() {
		return $this->url;
	}

	public function setUrl($url) {
		$this->url = $url;
	}

	public function getCommentaire() {
		return $this->commentaire;
	}

	public function setCommentaire($commentaire) {
		$this->commentaire = $commentaire;
	}

	public function getIsaffiche() {
		return $this->isaffiche;
	}

	public function setIsaffiche($isaffiche) {
		$this->isaffiche = $isaffiche;
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

	public function getIdrubrique() {
		return $this->idrubrique;
	}

	public function setIdrubrique($idrubrique) {
		$this->idrubrique = $idrubrique;
	}

	public function toJson() {
		return array('id' => $this->id, 'url' => $this->url, 'commentaire' => $this->commentaire, 'isaffiche' => $this->isaffiche, 'createdAt' => $this->createdAt, 'updatedAt' => $this->updatedAt, 'sliderSize' => 0);
	}

	public function __toString() {
		return (string) $this->id;
	}

}
