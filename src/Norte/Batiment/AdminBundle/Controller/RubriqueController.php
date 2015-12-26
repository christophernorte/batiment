<?php

namespace Norte\Batiment\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Norte\Batiment\CoreBundle\Beans\Entity\Rubrique;
use Norte\Batiment\AdminBundle\Form\RubriqueType;

/**
 * Rubrique controller.
 *
 * @Route("/secured/rubrique")
 */
class RubriqueController extends Controller
{

	/**
	 * Lists all Rubrique entities.
	 *
	 * @Route("/", name="secured_rubrique")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('adminBatimentBundle:Rubrique')->findAll();

		return array(
		    'entities' => $entities,
		);
	}

	/**
	 * Creates a new Rubrique entity.
	 *
	 * @Route("/", name="secured_rubrique_create")
	 * @Method("POST")
	 * @Template("adminBatimentBundle:Rubrique:new.html.twig")
	 */
	public function createAction(Request $request)
	{
		$entity = new Rubrique();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid())
		{
			$em = $this->getDoctrine()->getManager();

			$date = new \DateTime("now");

			$entity->setCreatedAt($date);
			$entity->setUpdatedAt($date);

			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('secured_rubrique_show', array('id' => $entity->getId())));
		}

		return array(
		    'entity' => $entity,
		    'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a Rubrique entity.
	 *
	 * @param Rubrique $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm(Rubrique $entity)
	{
		$form = $this->createForm(new RubriqueType(), $entity, array(
		    'action' => $this->generateUrl('secured_rubrique_create'),
		    'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Créer'));

		return $form;
	}

	/**
	 * Displays a form to create a new Rubrique entity.
	 *
	 * @Route("/new", name="secured_rubrique_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction()
	{
		$entity = new Rubrique();
		$form = $this->createCreateForm($entity);

		return array(
		    'entity' => $entity,
		    'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a Rubrique entity.
	 *
	 * @Route("/{id}", name="secured_rubrique_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('adminBatimentBundle:Rubrique')->find($id);

		if (!$entity)
		{
			throw $this->createNotFoundException('Unable to find Rubrique entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
		    'entity' => $entity,
		    'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Displays a form to edit an existing Rubrique entity.
	 *
	 * @Route("/{id}/edit", name="secured_rubrique_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('adminBatimentBundle:Rubrique')->find($id);

		if (!$entity)
		{
			throw $this->createNotFoundException('Unable to find Rubrique entity.');
		}

		$editForm = $this->createEditForm($entity);
		$deleteForm = $this->createDeleteForm($id);

		return array(
		    'entity' => $entity,
		    'edit_form' => $editForm->createView(),
		    'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to edit a Rubrique entity.
	 *
	 * @param Rubrique $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm(Rubrique $entity)
	{
		$form = $this->createForm(new RubriqueType(), $entity, array(
		    'action' => $this->generateUrl('secured_rubrique_update', array('id' => $entity->getId())),
		    'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Modifier'));

		return $form;
	}

	/**
	 * Edits an existing Rubrique entity.
	 *
	 * @Route("/{id}", name="secured_rubrique_update")
	 * @Method("PUT")
	 * @Template("adminBatimentBundle:Rubrique:edit.html.twig")
	 */
	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('adminBatimentBundle:Rubrique')->find($id);

		if (!$entity)
		{
			throw $this->createNotFoundException('Unable to find Rubrique entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid())
		{
			$date = new \DateTime("now");

			$entity->setUpdatedAt($date);
			
			$em->flush();

			return $this->redirect($this->generateUrl('secured_rubrique_edit', array('id' => $id)));
		}

		return array(
		    'entity' => $entity,
		    'edit_form' => $editForm->createView(),
		    'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a Rubrique entity.
	 *
	 * @Route("/{id}", name="secured_rubrique_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('adminBatimentBundle:Rubrique')->find($id);

			if (!$entity)
			{
				throw $this->createNotFoundException('Unable to find Rubrique entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('secured_rubrique'));
	}

	/**
	 * Creates a form to delete a Rubrique entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id)
	{
		return $this->createFormBuilder()
				->setAction($this->generateUrl('secured_rubrique_delete', array('id' => $id)))
				->setMethod('DELETE')
				->add('submit', 'submit', array('label' => 'Supprimer'))
				->getForm()
		;
	}

}
