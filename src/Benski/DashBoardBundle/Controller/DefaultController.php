<?php

namespace Benski\DashBoardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package Benski\DashBoardBundle\Controller
 * @Route("/dashboard")
 */
class DefaultController extends Controller
{

    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BenskiDashBoardBundle:Default:index.html.twig', array());
    }
}
