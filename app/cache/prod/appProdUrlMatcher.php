<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // default
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'default');
            }

            return array (  '_controller' => 'norte\\batimentBundle\\Controller\\PresentationController::indexAction',  '_route' => 'default',);
        }

        if (0 === strpos($pathinfo, '/co')) {
            if (0 === strpos($pathinfo, '/commentaire')) {
                // commentaire
                if (preg_match('#^/commentaire/(?P<idPhoto>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'commentaire')), array (  '_controller' => 'norte\\batimentBundle\\Controller\\CommentaireController::indexAction',));
                }

                // commentaire_create
                if ($pathinfo === '/commentaire/create/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_commentaire_create;
                    }

                    return array (  '_format' => 'json',  '_controller' => 'norte\\batimentBundle\\Controller\\CommentaireController::createAction',  '_route' => 'commentaire_create',);
                }
                not_commentaire_create:

            }

            // contact
            if (rtrim($pathinfo, '/') === '/contact') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'contact');
                }

                return array (  '_controller' => 'norte\\batimentBundle\\Controller\\ContactController::indexAction',  '_route' => 'contact',);
            }

        }

        // norte_batiment_default_index
        if ($pathinfo === '/batiment') {
            return array (  '_controller' => 'norte\\batimentBundle\\Controller\\DefaultController::indexAction',  '_route' => 'norte_batiment_default_index',);
        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/photo')) {
                // defaut
                if ($pathinfo === '/photo/defaut-photo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_defaut;
                    }

                    return array (  '_format' => 'json',  '_controller' => 'norte\\batimentBundle\\Controller\\PhotoController::defautPhotoAction',  '_route' => 'defaut',);
                }
                not_defaut:

                // photo
                if (0 === strpos($pathinfo, '/photo/rubrique-photo') && preg_match('#^/photo/rubrique\\-photo/(?P<idRubrique>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_photo;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'photo')), array (  '_format' => 'json',  '_controller' => 'norte\\batimentBundle\\Controller\\PhotoController::rubriquePhotoAction',));
                }
                not_photo:

                // photo_show
                if (preg_match('#^/photo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'photo_show')), array (  '_controller' => 'norte\\batimentBundle\\Controller\\PhotoController::showAction',));
                }

            }

            // presentation
            if (rtrim($pathinfo, '/') === '/presentation') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'presentation');
                }

                return array (  '_controller' => 'norte\\batimentBundle\\Controller\\PresentationController::indexAction',  '_route' => 'presentation',);
            }

        }

        if (0 === strpos($pathinfo, '/galerie')) {
            // galerie
            if (rtrim($pathinfo, '/') === '/galerie') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_galerie;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'galerie');
                }

                return array (  '_controller' => 'norte\\batimentBundle\\Controller\\RubriqueController::indexAction',  '_route' => 'galerie',);
            }
            not_galerie:

            // norte_batiment_rubrique_rubriques
            if ($pathinfo === '/galerie/rubriques') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_norte_batiment_rubrique_rubriques;
                }

                return array (  '_format' => 'json',  '_controller' => 'norte\\batimentBundle\\Controller\\RubriqueController::rubriquesAction',  '_route' => 'norte_batiment_rubrique_rubriques',);
            }
            not_norte_batiment_rubrique_rubriques:

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // norte_adminbatiment_default_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'norte\\adminBatimentBundle\\Controller\\DefaultController::loginAction',  '_route' => 'norte_adminbatiment_default_login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'norte\\adminBatimentBundle\\Controller\\DefaultController::securityCheckAction',  '_route' => 'login_check',);
                }

            }

            // _demo_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'norte\\adminBatimentBundle\\Controller\\DefaultController::logoutAction',  '_route' => '_demo_logout',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
