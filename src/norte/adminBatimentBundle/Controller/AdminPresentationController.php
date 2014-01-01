<?php

namespace norte\adminBatimentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/secured/presentation")
 */
class AdminPresentationController extends Controller {

	/**
	 * @Route("/",name="_adminpresentation")
	 * @Template()
	 */
	public function indexAction() {
		
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('batimentBundle:Presentation')->find(0);
		
		return array('entity' => $entity);
	}

	/**
	 * @Route("/edit",name="_edit")
	 * @Template()
	 */
	public function editAction() {
		return array();
	}

}
