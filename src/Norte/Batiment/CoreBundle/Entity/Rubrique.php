<?php

namespace Norte\Batiment\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Rubrique
 *
 * @ORM\Table(name="Rubrique")
 * @ORM\Entity
 */
class Rubrique
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
	 * @ORM\Column(name="nom", type="string", length=100, nullable=false)
	 */
	private $nom;
	/**
	 * @var string
	 *
	 * @ORM\Column(name="commentaire", type="text", nullable=true)
	 */
	private $commentaire;
	/**
	 * @var string
	 *
	 * @ORM\Column(name="adresse", type="string", length=200, nullable=true)
	 */
	private $adresse;
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;
	
	/**
	 * @ORM\OneToMany(targetEntity="Norte\Batiment\CoreBundle\Entity\Photo", mappedBy="idrubrique")
	 */
	private $photos;
	
	function __construct()
	{
		$this->updatedAt = new \DateTime();
		$this->createdAt = new \DateTime();
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getNom()
	{
		return $this->nom;
	}
	
	public function getUserCommentaire()
	{
		return $this->userCommentaire;
	}
	public function setUserCommentaire($userCommentaire)
	{
		$this->userCommentaire = $userCommentaire;
	}
	public function getCommentaire()
	{
		return $this->commentaire;
	}
	public function getAdresse()
	{
		return $this->adresse;
	}
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setCommentaire($commentaire)
	{
		$this->commentaire = $commentaire;
	}
	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;
	}
	public function setCreatedAt(\DateTime $createdAt)
	{
		$this->createdAt = $createdAt;
	}
	public function setUpdatedAt(\DateTime $updatedAt)
	{
		$this->updatedAt = $updatedAt;
	}
	
	function getPhotos()
	{
		return $this->photos;
	}

	function setPhotos($photos)
	{
		$this->photos = $photos;
	}

	public function __toString()
	{
		return $this->nom;
	}
	
	public function toJson() {
		return array('nom' => $this->nom, 'commentaire' => $this->commentaire, 'id' => $this->id);
	}
}