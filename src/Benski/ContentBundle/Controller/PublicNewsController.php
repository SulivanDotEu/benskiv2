<?php

namespace Benski\ContentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\ContentBundle\Entity\News;
use Benski\ContentBundle\Form\NewsType;

/**
 * News controller.
 *
 */
class PublicNewsController extends Controller {

    public static $nombreParPage = 6;

    /**
     * Lists all News entities.
     *
     */
    public function indexAction($page = 1) {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiContentBundle:News')
                ->getNews(self::$nombreParPage, $page);

        return $this->render('BenskiContentBundle:News:public/index.html.twig', array(
                    'entities' => $entities,
                    'page' => $page,
                    'nombrePage' => ceil(count($entities) / self::$nombreParPage)
        ));
    }

    /**
     * Finds and displays a News entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        return $this->render('BenskiContentBundle:News:public/show.html.twig', array(
                    'entity' => $entity,));
    }

}
