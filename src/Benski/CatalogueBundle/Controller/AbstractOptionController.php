<?php

namespace Benski\CatalogueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\CatalogueBundle\Entity\AbstractOption;

/**
 * AbstractOption controller.
 *
 */
class AbstractOptionController extends Controller
{

    /**
     * Lists all AbstractOption entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:AbstractOption')->findAll();

        return $this->render('BenskiCatalogueBundle:AbstractOption:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a AbstractOption entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:AbstractOption')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbstractOption entity.');
        }

        return $this->render('BenskiCatalogueBundle:AbstractOption:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
