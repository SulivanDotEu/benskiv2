<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BenskiCatalogueBundle:Default:index.html.twig', array('name' => $name));
    }
}
