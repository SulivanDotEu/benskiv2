<?php

namespace Benski\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class CommonController extends Controller {
    
    /**
     * @return type
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $destination = $em->getRepository('BenskiCatalogueBundle:Destination')->findByNom('Risoul')[0];
        $sejours = $em->getRepository('BenskiCatalogueBundle:Sejour')->findAll();
        $pack = $em->getRepository('BenskiCatalogueBundle:Pack')->findByAdminId('no-appart');
        $appartement = $em->getRepository('BenskiCatalogueBundle:Pack')->findByAdminId('no-appart');
        $defined = false;
        if($pack == null or 
                $appartement == null){
            $defined = false;
        }
        return $this->render('BenskiCommonBundle:Default:index.html.twig', array(
            'destination' => $destination,
            'sejours' => $sejours,
            'pack' => $pack,
            'appartement' => $appartement,
            'defined' => $defined,
        ));
        
        
        
        return $this->redirect($this->generateUrl('public_article_slug_content', array( 'slug' => 'index')));
        $user = $this->container->get('security.context')->getToken()->getUser();
        var_dump($user);
        /* @var $user \Benski\UserBundle\Entity\User */
        $isSuperAdmin = $user->isSuperAdmin();
        var_dump($isSuperAdmin);
        $roles = $user->getRoles();
        $lastLogin = $user->getLastLogin();
        var_dump($roles);
        var_dump($lastLogin);
        return $this->render('BenskiCommonBundle:Default:index.html.twig');
    }
    
}

?>
