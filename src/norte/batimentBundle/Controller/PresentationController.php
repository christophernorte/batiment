<?php

namespace norte\batimentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use norte\batimentBundle\Entity\Presentation;

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
//        echo $this->generateUrl('_demo');
        
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('batimentBundle:Presentation')->find(0);
        return array('entity' => $entity);
        
        
    }

}
