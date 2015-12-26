<?php

namespace Norte\Batiment\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Norte\Batiment\CoreBundle\Entity\Presentation;
use Norte\Batiment\AdminBundle\Form\PresentationType;

/**
 * Presentation controller.
 *
 * @Route("/presentation")
 */
class PresentationController extends Controller
{

    /**
    * Creates a form to create a Presentation entity.
    *
    * @param Presentation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Presentation $entity)
    {
        $form = $this->createForm(new PresentationType(), $entity, array(
            'action' => $this->generateUrl('secured_presentation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }


    /**
     * Displays a form to edit an existing Presentation entity.
     *
     * @Route("/edit", name="secured_presentation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listPresentation = $em->getRepository('NorteBatimentCoreBundle:Presentation')->findAll();
	
	$presentation = new Presentation();
	
	if(is_array($listPresentation))
	{
		$presentation = array_pop($listPresentation);
	}

        $editForm = $this->createEditForm($presentation);

        return array(
            'entity'      => $presentation,
            'edit_form'   => $editForm->createView()
        );
    }

    /**
    * Creates a form to edit a Presentation entity.
    *
    * @param Presentation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Presentation $entity)
    {
	    
        $form = $this->createForm(new PresentationType(), $entity, array(
            'action' => $this->generateUrl('secured_presentation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Presentation entity.
     *
     * @Route("/{id}", name="secured_presentation_update")
     * @Method("PUT")
     * @Template("adminBatimentBundle:Presentation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
	    
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NorteBatimentCoreBundle:Presentation')->find((int)$id);
	
	$entity->setId($id);
	
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presentation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('secured_presentation_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        );
    }
  
}
