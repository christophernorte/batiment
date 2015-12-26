<?php

namespace Norte\Batiment\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * 
 */
class DefaultController extends Controller
{

	/**
	 * @Route("/")
	 * @Template()
	 */
	public function IndexAction()
	{
		
		return $this->redirect($this->generateUrl('secured_presentation_edit'));
	}
	
	/**
	 * @Route("/login",name="_login")
	 * @Template()
	 */
	public function loginAction()
	{

		if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR))
		{
			$error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else
		{
			$error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
		}

		return array(
		    'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
		    'error' => $error
		);
	}

	/**
	 * @Route("/login_check", name="_login_check")
	 */
	public function securityCheckAction()
	{
		// The security layer will intercept this request
	}

	/**
	 * @Route("/logout", name="_demo_logout")
	 */
	public function logoutAction()
	{
		// The security layer will intercept this request
	}

}
