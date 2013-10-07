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

        // benski_common_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'benski_common_homepage')), array (  '_controller' => 'Benski\\CommonBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/sejour')) {
            // sejour
            if (rtrim($pathinfo, '/') === '/sejour') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sejour');
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::indexAction',  '_route' => 'sejour',);
            }

            // sejour_show
            if (preg_match('#^/sejour/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::showAction',));
            }

            // sejour_new
            if ($pathinfo === '/sejour/new') {
                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::newAction',  '_route' => 'sejour_new',);
            }

            // sejour_create
            if ($pathinfo === '/sejour/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sejour_create;
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::createAction',  '_route' => 'sejour_create',);
            }
            not_sejour_create:

            // sejour_edit
            if (preg_match('#^/sejour/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::editAction',));
            }

            // sejour_update
            if (preg_match('#^/sejour/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_sejour_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::updateAction',));
            }
            not_sejour_update:

            // sejour_delete
            if (preg_match('#^/sejour/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_sejour_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourController::deleteAction',));
            }
            not_sejour_delete:

        }

        if (0 === strpos($pathinfo, '/appartement')) {
            // appartement
            if (rtrim($pathinfo, '/') === '/appartement') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'appartement');
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::indexAction',  '_route' => 'appartement',);
            }

            // appartement_show
            if (preg_match('#^/appartement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'appartement_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::showAction',));
            }

            // appartement_new
            if ($pathinfo === '/appartement/new') {
                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::newAction',  '_route' => 'appartement_new',);
            }

            // appartement_create
            if ($pathinfo === '/appartement/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_appartement_create;
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::createAction',  '_route' => 'appartement_create',);
            }
            not_appartement_create:

            // appartement_edit
            if (preg_match('#^/appartement/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'appartement_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::editAction',));
            }

            // appartement_update
            if (preg_match('#^/appartement/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_appartement_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'appartement_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::updateAction',));
            }
            not_appartement_update:

            // appartement_delete
            if (preg_match('#^/appartement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_appartement_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'appartement_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AppartementController::deleteAction',));
            }
            not_appartement_delete:

        }

        if (0 === strpos($pathinfo, '/d')) {
            if (0 === strpos($pathinfo, '/destination')) {
                // destination
                if (rtrim($pathinfo, '/') === '/destination') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'destination');
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::indexAction',  '_route' => 'destination',);
                }

                // destination_show
                if (preg_match('#^/destination/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'destination_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::showAction',));
                }

                // destination_new
                if ($pathinfo === '/destination/new') {
                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::newAction',  '_route' => 'destination_new',);
                }

                // destination_create
                if ($pathinfo === '/destination/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_destination_create;
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::createAction',  '_route' => 'destination_create',);
                }
                not_destination_create:

                // destination_edit
                if (preg_match('#^/destination/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'destination_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::editAction',));
                }

                // destination_update
                if (preg_match('#^/destination/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_destination_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'destination_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::updateAction',));
                }
                not_destination_update:

                // destination_delete
                if (preg_match('#^/destination/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_destination_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'destination_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DestinationController::deleteAction',));
                }
                not_destination_delete:

            }

            if (0 === strpos($pathinfo, '/date')) {
                // date
                if (rtrim($pathinfo, '/') === '/date') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'date');
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::indexAction',  '_route' => 'date',);
                }

                // date_show
                if (preg_match('#^/date/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'date_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::showAction',));
                }

                // date_new
                if ($pathinfo === '/date/new') {
                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::newAction',  '_route' => 'date_new',);
                }

                // date_create
                if ($pathinfo === '/date/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_date_create;
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::createAction',  '_route' => 'date_create',);
                }
                not_date_create:

                // date_edit
                if (preg_match('#^/date/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'date_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::editAction',));
                }

                // date_update
                if (preg_match('#^/date/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_date_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'date_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::updateAction',));
                }
                not_date_update:

                // date_delete
                if (preg_match('#^/date/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_date_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'date_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\DateController::deleteAction',));
                }
                not_date_delete:

            }

        }

        if (0 === strpos($pathinfo, '/packdescriptor')) {
            // packdescriptor
            if (rtrim($pathinfo, '/') === '/packdescriptor') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'packdescriptor');
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::indexAction',  '_route' => 'packdescriptor',);
            }

            // packdescriptor_show
            if (preg_match('#^/packdescriptor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'packdescriptor_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::showAction',));
            }

            // packdescriptor_new
            if ($pathinfo === '/packdescriptor/new') {
                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::newAction',  '_route' => 'packdescriptor_new',);
            }

            // packdescriptor_create
            if ($pathinfo === '/packdescriptor/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_packdescriptor_create;
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::createAction',  '_route' => 'packdescriptor_create',);
            }
            not_packdescriptor_create:

            // packdescriptor_edit
            if (preg_match('#^/packdescriptor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'packdescriptor_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::editAction',));
            }

            // packdescriptor_update
            if (preg_match('#^/packdescriptor/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_packdescriptor_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'packdescriptor_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::updateAction',));
            }
            not_packdescriptor_update:

            // packdescriptor_delete
            if (preg_match('#^/packdescriptor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_packdescriptor_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'packdescriptor_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackDescriptorController::deleteAction',));
            }
            not_packdescriptor_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
