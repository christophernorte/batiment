<?php

namespace Norte\Batiment\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Norte\Batiment\CoreBundle\Beans\Entity\Contact;

/**
 * Contact controller.
 *
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * Lists all Contact entities.
     *
     * @Route("/", name="contact")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NorteBatimentCoreBundle:Contact')->findAll();

        return array('entities' => $entities);
    }

}
