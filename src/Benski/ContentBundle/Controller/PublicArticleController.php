<?php

namespace Benski\ContentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\ContentBundle\Entity\Article;
use Benski\ContentBundle\Form\ArticleType;

/**
 * Article controller.
 *
 */
class PublicArticleController extends Controller {

    /**
     * Finds and displays a Article entity.
     *
     */
    public function showBySlugAction($slug, $content_only = true) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:Article')->findBySlug($slug);

        if (!$entity) {
            return $this->render('BenskiContentBundle:Article:public\no_result.html.twig');
        }
        
        $entity = $entity[0];

        if ($content_only) {
            return $this->render('BenskiContentBundle:Article:public\show_content.html.twig', array(
                        'entity' => $entity,
            ));
        } else {
            return $this->render('BenskiContentBundle:Article:public\show.html.twig', array(
                        'entity' => $entity,
            ));
        }
    }

    /**
     * Lists all Article entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiContentBundle:Article')->findAll();

        return $this->render('BenskiContentBundle:Article:public\index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Article entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:Article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        return $this->render('BenskiContentBundle:Article:public\show.html.twig', array(
                    'entity' => $entity,
        ));
    }

}
