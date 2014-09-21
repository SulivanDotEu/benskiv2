<?php

namespace Benski\WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PublicController
 * @package Benski\WebsiteBundle\Controller
 */
class PublicController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $destination = $em->getRepository('BenskiCatalogueBundle:Destination')->findByNom('Risoul');
        if(empty($destination)) throw new \Exception("Please init the website");
        $destination = $destination[0];
//        $sejours = $em->getRepository('BenskiCatalogueBundle:Sejour')->findAll();
//        $pack = $em->getRepository('BenskiCatalogueBundle:Pack')->findByAdminId('no-appart');
//        $appartement = $em->getRepository('BenskiCatalogueBundle:Pack')->findByAdminId('no-appart');
//        $defined = false;
//        if($pack == null or
//            $appartement == null){
//            $defined = false;
//        }

        return $this->render('@BenskiWebsite/Public/home.html.twig', array(
            'destination' => $destination,
//            'sejours' => $sejours,
//            'pack' => $pack,
//            'appartement' => $appartement,
//            'defined' => $defined,
        ));
    }

    /**
     *
     */
    public function pageAction(){

    }
}
