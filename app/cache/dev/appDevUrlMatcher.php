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

        // user
        if (rtrim($pathinfo, '/') === '/user') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'user');
            }

            return array (  '_controller' => 'Benski\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
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

            return array (  '_controller' => 'Benski\\CommonBundle\\Controller\\CommonController::indexAction',  '_route' => 'benski_common_home',);
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

        if (0 === strpos($pathinfo, '/sejour-')) {
            if (0 === strpos($pathinfo, '/sejour-appartement')) {
                // sejour_appartement
                if (rtrim($pathinfo, '/') === '/sejour-appartement') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sejour_appartement');
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::indexAction',  '_route' => 'sejour_appartement',);
                }

                // sejour_appartement_show
                if (preg_match('#^/sejour\\-appartement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::showAction',));
                }

                // sejour_appartement_bind
                if (0 === strpos($pathinfo, '/sejour-appartement/bind') && preg_match('#^/sejour\\-appartement/bind/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_bind')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::bindAction',));
                }

                // sejour_appartement_create
                if ($pathinfo === '/sejour-appartement/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sejour_appartement_create;
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::createAction',  '_route' => 'sejour_appartement_create',);
                }
                not_sejour_appartement_create:

                // sejour_appartement_edit
                if (0 === strpos($pathinfo, '/sejour-appartement/edit') && preg_match('#^/sejour\\-appartement/edit/(?P<appartement>[^/]++)/(?P<sejour>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::editAction',));
                }

                // sejour_appartement_update
                if (0 === strpos($pathinfo, '/sejour-appartement/update') && preg_match('#^/sejour\\-appartement/update/(?P<appartement>[^/]++)/(?P<sejour>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_sejour_appartement_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::updateAction',));
                }
                not_sejour_appartement_update:

                // sejour_appartement_delete
                if (preg_match('#^/sejour\\-appartement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_sejour_appartement_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_appartement_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourAppartementController::deleteAction',));
                }
                not_sejour_appartement_delete:

            }

            if (0 === strpos($pathinfo, '/sejour-pack')) {
                // sejour_pack
                if (rtrim($pathinfo, '/') === '/sejour-pack') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sejour_pack');
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::indexAction',  '_route' => 'sejour_pack',);
                }

                // sejour_pack_show
                if (preg_match('#^/sejour\\-pack/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_pack_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::showAction',));
                }

                // sejour_pack_bind
                if (0 === strpos($pathinfo, '/sejour-pack/bind') && preg_match('#^/sejour\\-pack/bind/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_pack_bind')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::bindAction',));
                }

                // sejour_pack_create
                if ($pathinfo === '/sejour-pack/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sejour_pack_create;
                    }

                    return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::createAction',  '_route' => 'sejour_pack_create',);
                }
                not_sejour_pack_create:

                // sejour_pack_edit
                if (0 === strpos($pathinfo, '/sejour-pack/edit') && preg_match('#^/sejour\\-pack/edit/(?P<pack>[^/]++)/(?P<sejour>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_pack_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::editAction',));
                }

                // sejour_pack_update
                if (0 === strpos($pathinfo, '/sejour-pack/update') && preg_match('#^/sejour\\-pack/update/(?P<pack>[^/]++)/(?P<sejour>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_sejour_pack_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_pack_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::updateAction',));
                }
                not_sejour_pack_update:

                // sejour_pack_delete
                if (preg_match('#^/sejour\\-pack/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_sejour_pack_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sejour_pack_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\SejourPackController::deleteAction',));
                }
                not_sejour_pack_delete:

            }

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

        if (0 === strpos($pathinfo, '/pack')) {
            // pack
            if (rtrim($pathinfo, '/') === '/pack') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'pack');
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::indexAction',  '_route' => 'pack',);
            }

            // pack_show
            if (preg_match('#^/pack/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pack_show')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::showAction',));
            }

            // pack_new
            if ($pathinfo === '/pack/new') {
                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::newAction',  '_route' => 'pack_new',);
            }

            // pack_create
            if ($pathinfo === '/pack/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_pack_create;
                }

                return array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::createAction',  '_route' => 'pack_create',);
            }
            not_pack_create:

            // pack_edit
            if (preg_match('#^/pack/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pack_edit')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::editAction',));
            }

            // pack_update
            if (preg_match('#^/pack/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_pack_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pack_update')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::updateAction',));
            }
            not_pack_update:

            // pack_delete
            if (preg_match('#^/pack/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_pack_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pack_delete')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::deleteAction',));
            }
            not_pack_delete:

            // pack_bind_option_form
            if (preg_match('#^/pack/(?P<packId>[^/]++)/bind/option$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pack_bind_option_form')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::bindOptionFormAction',));
            }

            // pack_bind_option_create
            if (preg_match('#^/pack/(?P<packId>[^/]++)/bind/option/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pack_bind_option_create')), array (  '_controller' => 'Benski\\CatalogueBundle\\Controller\\PackController::createBindOptionAction',));
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
