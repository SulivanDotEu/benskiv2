<?php

namespace Benski\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BenskiUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
