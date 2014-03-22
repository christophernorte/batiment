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
		$em = $this->getDoctrine()->getManager();
		
		$entities = $em->getRepository('batimentBundle:Commentaire')->findAll();
		
		$query = $em->createQuery("SELECT c FROM batimentBundle:Commentaire c WHERE c.idphoto = :idphoto AND c.isaffiche=1");
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
	public function createAction()
	{
		
		$request = $this->getRequest();
		
		$commentaire = new Commentaire();
		
		$commentaire->setText($request->get('text'));
		$commentaire->setIsaffiche(false);
		
		$photo = $this->getDoctrine()->getRepository('batimentBundle:Photo')->find($request->get('idphoto'));
		$commentaire->setIdphoto($photo);
		
		$form = $this->createForm(new CommentaireType(), $commentaire,array('csrf_protection' => false));
		$form->handleRequest($request);
		
		if ($form->isValid()) 
		{
			
			$em = $this->getDoctrine()->getManager();
			$commentaire->setDate();
			$commentaire->setText($request->get('text'));
			$em->persist($commentaire);
			$em->flush();
		}
		
		$response = new Response();
		$response->headers->set('Content-type', 'application/json; charset=utf-8');

		return $this->render('batimentBundle:Commentaire:new.json.twig', array('rep' => $form->isValid() ? 'true' : 'false'), $response);
	}

}
