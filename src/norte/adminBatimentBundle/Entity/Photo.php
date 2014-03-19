<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Photo
 *
 * @ORM\Table(name="Photo", indexes={@ORM\Index(name="idrubrique_idx", columns={"idrubrique"})})
 * @ORM\Entity
 */
class Photo
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
	 * @ORM\Column(name="url", type="string", length=200, nullable=true)
	 */
	private $url;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="commentaire", type="text", nullable=true)
	 */
	private $commentaire;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="isaffiche", type="boolean", nullable=false)
	 */
	private $isaffiche = true;

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
	 * @var \Rubrique
	 *
	 * @ORM\ManyToOne(targetEntity="Rubrique")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="idrubrique", referencedColumnName="id")
	 * })
	 */
	private $idrubrique;
	
       /**
	* @Assert\File(maxSize="6000000")
	*/
       public $image;

	public function getId()
	{
		return $this->id;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getCommentaire()
	{
		return $this->commentaire;
	}

	public function getIsaffiche()
	{
		return $this->isaffiche;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	public function getIdrubrique()
	{
		return $this->idrubrique;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setUrl($url)
	{
		$this->url = $url;
	}

	public function setCommentaire($commentaire)
	{
		$this->commentaire = $commentaire;
	}

	public function setIsaffiche($isaffiche)
	{
		$this->isaffiche = $isaffiche;
	}

	public function setCreatedAt(\DateTime $createdAt)
	{
		$this->createdAt = $createdAt;
	}

	public function setUpdatedAt(\DateTime $updatedAt)
	{
		$this->updatedAt = $updatedAt;
	}

	public function setIdrubrique(\norte\adminBatimentBundle\Entity\Rubrique $idrubrique)
	{
		$this->idrubrique = $idrubrique;
	}

	public function upload()
	{
		// la propriété « file » peut être vide si le champ n'est pas requis
		if (null === $this->image)
		{
			return;
		}

		// utilisez le nom de fichier original ici mais
		// vous devriez « l'assainir » pour au moins éviter
		// quelconques problèmes de sécurité
		// la méthode « move » prend comme arguments le répertoire cible et
		// le nom de fichier cible où le fichier doit être déplacé
		$this->image->move($this->getUploadRootDir(), $this->image->getClientOriginalName());

		// définit la propriété « path » comme étant le nom de fichier où vous
		// avez stocké le fichier
		$this->url = DIRECTORY_SEPARATOR . $this->getUploadDir() . $this->image->getClientOriginalName();
	}

	public function isImageFile()
	{
		return true;
	}

	public function getImageFile()
	{
		return new File($this->getWebRootDir() . $this->url);
	}

	public function hasImageFile()
	{
		return file_exists($this->getWebRootDir() . $this->url);
	}

	protected function getWebRootDir()
	{

		// le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
		return __DIR__ . '/../../../../web/';
	}

	protected function getUploadRootDir()
	{

		// le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
		return $this->getWebRootDir() . $this->getUploadDir();
	}

	protected function getUploadDir()
	{
		// on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
		// le document/image dans la vue.
		return 'bundles/batiment/images/photo/';
	}

	public function getAbsolutePath()
	{
		$url = dirname($this->url);
		return null === $url ? null : $this->getUploadRootDir() . '/' . $url;
	}

	public function getWebPath()
	{
		$url = dirname($this->url);
		return null === $url ? null : $this->getUploadDir() . '/' . $url;
	}

	public function removeFile()
	{
		unlink($this->getWebRootDir() . $this->url);
	}

}
