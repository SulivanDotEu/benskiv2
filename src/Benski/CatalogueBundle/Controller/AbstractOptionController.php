<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Benski\CatalogueBundle\Entity\Option\OptionACocher;
use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;

/**
 * AbstractOption controller.
 *
 */
class AbstractOptionController extends Controller {

    /**
     * Lists all AbstractOption entities.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction() {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }


        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Option\AbstractOption')->findAll();

        return $this->render('BenskiCatalogueBundle:AbstractOption:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a AbstractOption entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function showAction($id) {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\AbstractOption')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AbstractOption entity.');
        }

        
        if($entity instanceof OptionACocher){
            return $this->redirect($this->generateUrl('option_optionacocher_show', array('id' => $id )));
        }
        else if($entity instanceof OptionChoixMultiple){
            return $this->redirect($this->generateUrl('optionchoixmultiple_show', array('id' => $id )));
        }else {
            die('problem');
        }
        return $this->render('BenskiCatalogueBundle:AbstractOption:show.html.twig', array(
                    'entity' => $entity,
        ));
    }

}
