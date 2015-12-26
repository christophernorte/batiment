<?php

namespace norte\adminBatimentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Norte\Batiment\CoreBundle\Beans\Entity\Photo;
use norte\adminBatimentBundle\Form\PhotoType;
use norte\adminBatimentBundle\Form\RubriqueFilterType;
use Norte\Batiment\CoreBundle\Beans\Entity\Rubrique;

/**
 * Photo controller.
 *
 * @Route("/secured/photo")
 */
class PhotoController extends Controller
{

	/**
	 * Lists all Photo entities.
	 *
	 * @Route("/", name="secured_photo")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('adminBatimentBundle:Photo')->findAll();

		$formRubrique = $this->createRubriqueFilterForm(new Rubrique());

		return array(
		    'entities' => $entities,
		    'formRubriques' => $formRubrique->createView()
		);
	}

	/**
	 * Lists all Photo entities.
	 *
	 * @Route("/rubrique/selected", name="secured_photo_rubrique_selected")
	 * @Method("POST")
	 * @Template()
	 */
	public function rubriqueSelectedAction(Request $request)
	{

		$selectedRubrique = new Rubrique();
		$formRubrique = $this->createRubriqueFilterForm($selectedRubrique);
		$formRubrique->handleRequest($request);
		
		if ($formRubrique->isValid())
		{
			$selectedRubrique = $formRubrique['nom']->getData();
			$em = $this->getDoctrine()->getManager();
			$photos = $em->getRepository('adminBatimentBundle:Photo')->findBy(array('idrubrique' => $selectedRubrique));
		}



		return $this->render('adminBatimentBundle:Photo:index.html.twig', array(
			    'entities' => $photos,
			    'formRubriques' => $formRubrique->createView()
		));
	}

	/**
	 * Creates a form to create a Rubrique entity.
	 *
	 * @param Rubrique $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createRubriqueFilterForm(Rubrique $rubrique)
	{
		$form = $this->createForm(new RubriqueFilterType(), null, array(
		    'action' => $this->generateUrl('secured_photo_rubrique_selected'),
		    'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Filtrer'));

		return $form;
	}

	/**
	 * Creates a new Photo entity.
	 *
	 * @Route("/", name="secured_photo_create")
	 * @Method("POST")
	 * @Template("adminBatimentBundle:Photo:new.html.twig")
	 */
	public function createAction(Request $request)
	{
		$entity = new Photo();
		$entity->setLogger($this->get('logger'));
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($this->getRequest()->isMethod('POST'))
		{

			if ($form->isValid())
			{
				$em = $this->getDoctrine()->getManager();

				$date = new \DateTime("now");

				$entity->setCreatedAt($date);
				$entity->setUpdatedAt($date);
				$entity->upload();

				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('secured_photo_show', array('id' => $entity->getId())));
			}
		}

		return array(
		    'entity' => $entity,
		    'form' => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a Photo entity.
	 *
	 * @param Photo $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm(Photo $entity)
	{
		$form = $this->createForm(new PhotoType(), $entity, array(
		    'action' => $this->generateUrl('secured_photo_create'),
		    'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Créer'));

		return $form;
	}

	/**
	 * Displays a form to create a new Photo entity.
	 *
	 * @Route("/new", name="secured_photo_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction()
	{
		$entity = new Photo();
		$form = $this->createCreateForm($entity);

		return array(
		    'entity' => $entity,
		    'form' => $form->createView(),
		);
	}

	/**
	 * Finds and displays a Photo entity.
	 *
	 * @Route("/{id}", name="secured_photo_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('adminBatimentBundle:Photo')->find($id);

		if (!$entity)
		{
			throw $this->createNotFoundException('Unable to find Photo entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return array(
		    'entity' => $entity,
		    'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Displays a form to edit an existing Photo entity.
	 *
	 * @Route("/{id}/edit", name="secured_photo_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('adminBatimentBundle:Photo')->find($id);

		if (!$entity)
		{
			throw $this->createNotFoundException('Unable to find Photo entity.');
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
	 * Creates a form to edit a Photo entity.
	 *
	 * @param Photo $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm(Photo $entity)
	{
		$form = $this->createForm(new PhotoType(), $entity, array(
		    'action' => $this->generateUrl('secured_photo_update', array('id' => $entity->getId())),
		    'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Modifier'));

		return $form;
	}

	/**
	 * Edits an existing Photo entity.
	 *
	 * @Route("/{id}", name="secured_photo_update")
	 * @Method("PUT")
	 * @Template("adminBatimentBundle:Photo:edit.html.twig")
	 */
	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('adminBatimentBundle:Photo')->find($id);

		if (!$entity)
		{
			throw $this->createNotFoundException('Unable to find Photo entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid())
		{

			$date = new \DateTime("now");

			$entity->setUpdatedAt($date);

			$em->flush();

			return $this->redirect($this->generateUrl('secured_photo_edit', array('id' => $id)));
		}

		return array(
		    'entity' => $entity,
		    'edit_form' => $editForm->createView(),
		    'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a Photo entity.
	 *
	 * @Route("/{id}", name="secured_photo_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('adminBatimentBundle:Photo')->find($id);

			$entity->removeFile();

			if (!$entity)
			{
				throw $this->createNotFoundException('Unable to find Photo entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('secured_photo'));
	}

	/**
	 * Creates a form to delete a Photo entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id)
	{
		return $this->createFormBuilder()
				->setAction($this->generateUrl('secured_photo_delete', array('id' => $id)))
				->setMethod('DELETE')
				->add('submit', 'submit', array('label' => 'Supprimer'))
				->getForm()
		;
	}

}
