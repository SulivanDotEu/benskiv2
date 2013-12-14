<?php

namespace Benski\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Doctrine\UserManager;

class UserController extends Controller
{
    public function indexAction()
    {        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $userManager = $this->container->get('fos_user.user_manager');
        /* @var $userManager UserManager */
        
        $entities = $userManager->findUsers();

        return $this->render('BenskiUserBundle:User:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    
    

  
}
