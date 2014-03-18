<?php

namespace norte\adminBatimentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Photo
 */
class Photo
{

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @var string
	 */
	private $commentaire;

	/**
	 * @var boolean
	 */
	private $isaffiche;

	/**
	 * @var \DateTime
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 */
	private $updatedAt;

	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var \norte\adminBatimentBundle\Entity\Rubrique
	 */
	private $idrubrique;

	/**
	 * Set url
	 *
	 * @param string $url
	 * @return Photo
	 */
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * Get url
	 *
	 * @return string 
	 */
	public function getUrl()
	{
		if($this->id === null)
		{
			return $this->url;
		}else
		{
			return new File($this->getWebRootDir().$this->url);
		}
	}

	/**
	 * Set commentaire
	 *
	 * @param string $commentaire
	 * @return Photo
	 */
	public function setCommentaire($commentaire)
	{
		$this->commentaire = $commentaire;

		return $this;
	}

	/**
	 * Get commentaire
	 *
	 * @return string 
	 */
	public function getCommentaire()
	{
		return $this->commentaire;
	}

	/**
	 * Set isaffiche
	 *
	 * @param boolean $isaffiche
	 * @return Photo
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
	 * Set createdAt
	 *
	 * @param \DateTime $createdAt
	 * @return Photo
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Get createdAt
	 *
	 * @return \DateTime 
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Set updatedAt
	 *
	 * @param \DateTime $updatedAt
	 * @return Photo
	 */
	public function setUpdatedAt($updatedAt)
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}

	/**
	 * Get updatedAt
	 *
	 * @return \DateTime 
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
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
	 * Set idrubrique
	 *
	 * @param \norte\adminBatimentBundle\Entity\Rubrique $idrubrique
	 * @return Photo
	 */
	public function setIdrubrique(\norte\adminBatimentBundle\Entity\Rubrique $idrubrique = null)
	{
		$this->idrubrique = $idrubrique;

		return $this;
	}

	/**
	 * Get idrubrique
	 *
	 * @return \norte\adminBatimentBundle\Entity\Rubrique 
	 */
	public function getIdrubrique()
	{
		return $this->idrubrique;
	}

	public function upload()
	{
		// la propriété « file » peut être vide si le champ n'est pas requis
		if (null === $this->url)
		{
			return;
		}

		// utilisez le nom de fichier original ici mais
		// vous devriez « l'assainir » pour au moins éviter
		// quelconques problèmes de sécurité
		// la méthode « move » prend comme arguments le répertoire cible et
		// le nom de fichier cible où le fichier doit être déplacé
		$this->url->move($this->getUploadRootDir(), $this->url->getClientOriginalName());

		// définit la propriété « path » comme étant le nom de fichier où vous
		// avez stocké le fichier
		$this->url = DIRECTORY_SEPARATOR.$this->getUploadDir().$this->url->getClientOriginalName();

	}

	public function isUrlFile()
	{
		return true;
	}

	public function getUrlFile()
	{
		$file = null;

		if ($this->id !== null)
		{
			$file = new File($this->getWebRootDir() . $this->url);
		}

		return $file;
	}

	public function hasUrlFile()
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
		unlink($this->getWebRootDir().$this->url);
	}

}
