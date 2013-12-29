<?php

namespace norte\batimentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use norte\batimentBundle\Entity\Rubrique;

/**
 * Rubrique controller.
 *
 * @Route("/galerie")
 */
class RubriqueController extends Controller {

    /**
     * Lists all Rubrique entities.
     *
     * @Route("/", name="galerie")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction() {
        return array();
    }
    
    /**
     * Lists all Rubrique entities.
     * @Route("/rubriques", defaults={"_format"="json"})
     * @Method({"GET"})
     * @Template()
     */
    public function rubriquesAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('batimentBundle:Rubrique')->findAll();
        $response = new Response();
        $response->headers->set('Content-type', 'application/json; charset=utf-8');

        return $this->render('batimentBundle:Rubrique:index.json.twig',array('entities'=> $entities,'sizeList'=> count($entities)), $response);
    }

}