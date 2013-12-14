<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Benski\ReservationBundle\Entity\ReservationImpl;
use Benski\ReservationBundle\Form\ReservationImplType;
use Benski\ReservationBundle\Entity\ReservationSejour;

/**
 * ReservationImpl controller.
 *
 * @Route("/membre/reservation")
 */
class PublicReservationImplController extends Controller
{

    /**
     * Lists all ReservationImpl entities.
     *
     * @Route("/", name="public_reservation")
     * @Method("GET")
     * @Template("BenskiReservationBundle:ReservationImpl:Public\index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usr= $this->get('security.context')->getToken()->getUser();

        $entities = $em->getRepository('BenskiReservationBundle:ReservationImpl')
                ->findByResponsable($usr);

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ReservationImpl entity.
     *
     * @Route("/{id}", name="public_reservation_show")
     * @Method("GET")
     * @Template("BenskiReservationBundle:ReservationImpl:Public\show.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationImpl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationImpl entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }


}
