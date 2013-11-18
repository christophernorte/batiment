<?php

namespace norte\batimentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use norte\batimentBundle\Entity\Commentaire;
use norte\batimentBundle\Form\CommentaireType;

/**
 * Commentaire controller.
 *
 * @Route("/commentaire")
 */
class CommentaireController extends Controller {

	/**
	 * Lists all Commentaire entities.
	 *
	 * @Route("/{idPhoto}", name="commentaire")
	 * @Template()
	 */
	public function indexAction($idPhoto) {
		$em = $this->getDoctrine()->getEntityManager();
		
		$entities = $em->getRepository('batimentBundle:Commentaire')->findAll();
		
		$query = $em->createQuery("SELECT c FROM batimentBundle:Commentaire c WHERE c.idphoto = :idphoto");
		$query->setParameter('idphoto',$idPhoto);
		$entities = $query->getResult();

		return array('entities' => $entities,'sizeList' => count($entities));
	}
	

	/**
	 * Creates a new Commentaire entity.
	 *
	 * fixme : Rendre actif le systeme de binding automatique. Rendre actif la validation "champs vide" sur text. 
	 * 
	 * @Route("/create/", name="commentaire_create", defaults={"_format"="json"})
	 * @Method("POST")
	 * @Template("batimentBundle:Commentaire:new.json.twig")
	 */
	public function createAction() {
		$entity = new Commentaire();
		$request = $this->getRequest();
		$form = $this->createForm(new CommentaireType(), $entity,array('csrf_protection' => false));
		$form->bindRequest($request);
		
		$entity->setText($request->get('text'));
		$entity->setIsaffiche(false);
		$photo = $this->getDoctrine()->getRepository('batimentBundle:Photo')->find($request->get('idphoto'));
		
		$entity->setIdphoto($photo);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getEntityManager();
			$entity->setDate();
			$em->persist($entity);
			$em->flush();
		}
		
		$response = new Response();
		$response->headers->set('Content-type', 'application/json; charset=utf-8');

		return $this->render('batimentBundle:Commentaire:new.json.twig', array('rep' => $form->isValid() ? 'true' : 'false'), $response);
	}

}
