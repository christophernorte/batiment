<?php

namespace Norte\Batiment\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Norte\Batiment\CoreBundle\Beans\Entity\Presentation;

/**
 * Presentation controller.
 *
 * @Route("/presentation")
 */
class PresentationController extends Controller
{
    /**
     * Lists all Presentation entities.
     *
     * 
     * @Route("/", name="presentation")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listPresentation = $em->getRepository('NorteBatimentCoreBundle:Presentation')->findAll();
	$presentation = array_pop($listPresentation);
        return array('entity' => $presentation);
    }

}
