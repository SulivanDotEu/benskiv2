<?php

namespace Benski\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\UserBundle\Entity\User;
use Benski\UserBundle\Form\UserType;

/**
 * User controller.
 *
 */
class PublicUserController extends Controller
{

    public function homeAction(){
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        $em = $this->getDoctrine()->getManager();
        //$paiements = $em->getRepository('BenskiReservationBundle:Paiement')->findByUser($user);
        $paiements = $user->getPaiements();
        
        $reservations = $em->getRepository('BenskiReservationBundle:ReservationImpl')
                ->findByResponsable($user);
        
        return $this->render('BenskiUserBundle:public:membre\home.html.twig', array(
            'entity' => $user,
            'paiements' => $paiements,
            'reservations' => $reservations,
        ));
    }
}
