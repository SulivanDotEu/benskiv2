<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/news')) {
            // news
            if (rtrim($pathinfo, '/') === '/news') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'news');
                }

                return array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::indexAction',  '_route' => 'news',);
            }

            // news_show
            if (preg_match('#^/news/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_show')), array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::showAction',));
            }

            // news_new
            if ($pathinfo === '/news/new') {
                return array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::newAction',  '_route' => 'news_new',);
            }

            // news_create
            if ($pathinfo === '/news/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_news_create;
                }

                return array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::createAction',  '_route' => 'news_create',);
            }
            not_news_create:

            // news_edit
            if (preg_match('#^/news/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_edit')), array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::editAction',));
            }

            // news_update
            if (preg_match('#^/news/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_news_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_update')), array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::updateAction',));
            }
            not_news_update:

            // news_delete
            if (preg_match('#^/news/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_news_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_delete')), array (  '_controller' => 'Benski\\NewsBundle\\Controller\\NewsController::deleteAction',));
            }
            not_news_delete:

        }

        // benski_common_home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'benski_common_home');
            }

            return array (  '_controller' => 'BenskiCommonBundle:Common:index',  '_route' => 'benski_common_home',);
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

        if (0 === strpos($pathinfo, '/sejourappartement')) {
            // sejour_appartement
            if (rtrim($pathinfo, '/') === '/sejourappartement') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sejour_appartement');
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::indexAction',  '_route' => 'sejour_appartement',);
            }

            // sejour_appartement_show
            if (preg_match('#^/sejourappartement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::showAction',));
            }

            // sejour_appartement_bind
            if (0 === strpos($pathinfo, '/sejourappartement/bind') && preg_match('#^/sejourappartement/bind/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_bind')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::bindAction',));
            }

            // sejour_appartement_create
            if ($pathinfo === '/sejourappartement/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sejour_appartement_create;
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::createAction',  '_route' => 'sejour_appartement_create',);
            }
            not_sejour_appartement_create:

            // sejour_appartement_edit
            if (0 === strpos($pathinfo, '/sejourappartement/edit') && preg_match('#^/sejourappartement/edit/(?P<appartement>[^/]++)/(?P<sejour>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::editAction',));
            }

            // sejour_appartement_update
            if (0 === strpos($pathinfo, '/sejourappartement/update') && preg_match('#^/sejourappartement/update/(?P<appartement>[^/]++)/(?P<sejour>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_sejour_appartement_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::updateAction',));
            }
            not_sejour_appartement_update:

            // sejour_appartement_delete
            if (preg_match('#^/sejourappartement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_sejour_appartement_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::deleteAction',));
            }
            not_sejour_appartement_delete:

        }

        if (0 === strpos($pathinfo, '/option')) {
            // option
            if (rtrim($pathinfo, '/') === '/option') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'option');
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AbstractOptionController::indexAction',  '_route' => 'option',);
            }

            // option_show
            if (preg_match('#^/option/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'option_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\AbstractOptionController::showAction',));
            }

            if (0 === strpos($pathinfo, '/optionchoixmultiple')) {
                // optionchoixmultiple
                if (rtrim($pathinfo, '/') === '/optionchoixmultiple') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'optionchoixmultiple');
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::indexAction',  '_route' => 'optionchoixmultiple',);
                }

                // optionchoixmultiple_show
                if (preg_match('#^/optionchoixmultiple/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionchoixmultiple_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::showAction',));
                }

                // optionchoixmultiple_new
                if ($pathinfo === '/optionchoixmultiple/new') {
                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::newAction',  '_route' => 'optionchoixmultiple_new',);
                }

                // optionchoixmultiple_create
                if ($pathinfo === '/optionchoixmultiple/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_optionchoixmultiple_create;
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::createAction',  '_route' => 'optionchoixmultiple_create',);
                }
                not_optionchoixmultiple_create:

                // optionchoixmultiple_edit
                if (preg_match('#^/optionchoixmultiple/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionchoixmultiple_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::editAction',));
                }

                // optionchoixmultiple_update
                if (preg_match('#^/optionchoixmultiple/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_optionchoixmultiple_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionchoixmultiple_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::updateAction',));
                }
                not_optionchoixmultiple_update:

                // optionchoixmultiple_delete
                if (preg_match('#^/optionchoixmultiple/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_optionchoixmultiple_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionchoixmultiple_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\OptionChoixMultipleController::deleteAction',));
                }
                not_optionchoixmultiple_delete:

            }

            if (0 === strpos($pathinfo, '/optionacocher')) {
                // option_optionacocher
                if (rtrim($pathinfo, '/') === '/optionacocher') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'option_optionacocher');
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::indexAction',  '_route' => 'option_optionacocher',);
                }

                // option_optionacocher_show
                if (preg_match('#^/optionacocher/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'option_optionacocher_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::showAction',));
                }

                // option_optionacocher_new
                if ($pathinfo === '/optionacocher/new') {
                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::newAction',  '_route' => 'option_optionacocher_new',);
                }

                // option_optionacocher_create
                if ($pathinfo === '/optionacocher/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_option_optionacocher_create;
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::createAction',  '_route' => 'option_optionacocher_create',);
                }
                not_option_optionacocher_create:

                // option_optionacocher_edit
                if (preg_match('#^/optionacocher/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'option_optionacocher_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::editAction',));
                }

                // option_optionacocher_update
                if (preg_match('#^/optionacocher/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_option_optionacocher_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'option_optionacocher_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::updateAction',));
                }
                not_option_optionacocher_update:

                // option_optionacocher_delete
                if (preg_match('#^/optionacocher/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_option_optionacocher_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'option_optionacocher_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\Option\\OptionACocherController::deleteAction',));
                }
                not_option_optionacocher_delete:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
