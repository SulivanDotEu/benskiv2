<?php

namespace Benski\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {        
        return $this->render('BenskiUserBundle:User:index.html.twig', array('name' => "toi"));
    }
    

  
}
