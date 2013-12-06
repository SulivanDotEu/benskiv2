<?php

namespace Benski\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class CommonController extends Controller {
    
    /**
     * @return type
     */
    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        var_dump($user);
        /* @var $user \Benski\UserBundle\Entity\User */
        $isSuperAdmin = $user->isSuperAdmin();
        var_dump($isSuperAdmin);
        $roles = $user->getRoles();
        $lastLogin = $user->getLastLogin();
        var_dump($roles);
        var_dump($lastLogin);
        die();
        return $this->render('BenskiCommonBundle:Default:index.html.twig');
    }
    
}

?>
