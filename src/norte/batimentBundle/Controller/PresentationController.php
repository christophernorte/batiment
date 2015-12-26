<?php

namespace norte\batimentBundle\Controller;

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

        $entity = $em->getRepository('NorteBatimentCoreBundle:Presentation')->find(0);
        return array('entity' => $entity);
        
        
    }

}
