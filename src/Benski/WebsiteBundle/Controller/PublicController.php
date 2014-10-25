<?php

namespace Benski\WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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

//        $sejours = $em->getRepository('BenskiCatalogueBundle:Sejour')->findAll();
//        $pack = $em->getRepository('BenskiCatalogueBundle:Pack')->findByAdminId('no-appart');
//        $appartement = $em->getRepository('BenskiCatalogueBundle:Pack')->findByAdminId('no-appart');
//        $defined = false;
//        if($pack == null or
//            $appartement == null){
//            $defined = false;
//        }

        return $this->render('@BenskiWebsite/Public/home.html.twig', array(
//            'destination' => $destination,
//            'sejours' => $sejours,
//            'pack' => $pack,
//            'appartement' => $appartement,
//            'defined' => $defined,
        ));
    }

    /**
     *
     */
    public function marketActionAction(){
        $em = $this->getDoctrine()->getManager();
        $destination = $em->getRepository('BenskiCatalogueBundle:Destination')->findByNom('Risoul');
        //return new Response();
        if(empty($destination)) return new Response();
        $destination = $destination[0];

        return $this->render('@BenskiWebsite/Components/market.html.twig', array("destination" => $destination));
    }
}
