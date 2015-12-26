<?php

namespace norte\batimentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Norte\Batiment\CoreBundle\Entity\Photo;

/**
 * Photo controller.
 *
 * @Route("/photo")
 */
class PhotoController extends Controller {

	/**
	 * Lists all Photo entities.
	 *
	 * @Route("/", name="photo", defaults={"_format"="json"})
	 * @Method({"GET"})
	 * @Template()
	 */
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('NorteBatimentCoreBundle:Photo')->findAll();
		$response = new Response();
		$response->headers->set('Content-type', 'application/json; charset=utf-8');

		return $this->render('batimentBundle:Photo:index.json.twig', array('entities' => $entities, 'sizeList' => count($entities)), $response);
	}

	/**
	 * Liste les photos par defaut.
	 *
	 * @Route("/defaut-photo", name="defaut", defaults={"_format"="json"})
	 * @Method({"GET"})
	 * @Template()
	 */
	public function defautPhotoAction() {
		$em = $this->getDoctrine()->getManager();

		$query = $em->createQuery("SELECT p FROM NorteBatimentCoreBundle:Photo p WHERE p.idrubrique IS NULL");
		$photos = $query->getResult();

		if (count($photos) <= 0) {
			
			$query = $em->createQuery("SELECT r FROM NorteBatimentCoreBundle:Rubrique r")->setMaxResults(1);
			$firstRubrique = $query->getResult();

			if(count($firstRubrique) > 0)
			{
				$query = $em->createQuery("SELECT p FROM NorteBatimentCoreBundle:Photo p WHERE p.idrubrique = :idFirstRubrique");
				$query->setParameter('idFirstRubrique',$firstRubrique[0]->getId());
				$photos = $query->getResult();	
			}
			
		}

		$response = new Response();
		$response->headers->set('Content-type', 'application/json; charset=utf-8');

		return $this->render('batimentBundle:Photo:default.json.twig', array('defautPhotos' => $photos, 'sizeList' => count($photos)), $response);
	}
	
	/**
	 * Liste des photos pour une rubrique.
	 *
	 * @Route("/rubrique-photo/{idRubrique}", name="photo", defaults={"_format"="json"})
	 * @Method({"GET"})
	 * @Template()
	 */
	public function rubriquePhotoAction($idRubrique) {
		$em = $this->getDoctrine()->getManager();

		$query = $em->createQuery("SELECT p FROM NorteBatimentCoreBundle:Photo p WHERE p.idrubrique = :idRubrique");
		$query->setParameter('idRubrique',(int) $idRubrique);
		$photos = $query->getResult();

		$response = new Response();
		$response->headers->set('Content-type', 'application/json; charset=utf-8');

		return $this->render('batimentBundle:Photo:default.json.twig', array('defautPhotos' => $photos, 'sizeList' => count($photos)), $response);
	}

	/**
	 * Finds and displays a Photo entity.
	 *
	 * @Route("/{id}/show", name="photo_show")
	 * @Template()
	 */
	public function showAction($id) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('NorteBatimentCoreBundle:Photo')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Photo entity.');
		}

		return array(
		    'entity' => $entity,
		);
	}

}
