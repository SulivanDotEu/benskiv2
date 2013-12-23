<?php

namespace Benski\ReservationBundle\Controller\Option;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\ReservationBundle\Entity\Option\OptionReserve;
use Benski\ReservationBundle\Entity\Option\OptionACocherReserve;
use Benski\ReservationBundle\Entity\Option\OptionChoixMultipleReserve;

/**
 * Option\OptionReserve controller.
 *
 */
class OptionReserveController extends Controller {

   public function editAction($id) {
      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('BenskiReservationBundle:Option\OptionReserve');
      $entity = $repository->find($id);
      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Option\OptionReserve entity.');
      }

      if ($entity instanceof OptionACocherReserve) {
         return $this->redirect($this->generateUrl('option_optionacocherreserve_edit', array('id' => $id)));
      } elseif ($entity instanceof OptionChoixMultipleReserve) {
         return $this->redirect($this->generateUrl('option_optionchoixmultiplereserve_edit', array('id' => $id)));
      } else throw new \LogicException("Comportement theoriquement impossible");
   }

   /**
    * Lists all Option\OptionReserve entities.
    *
    */
   public function indexAction() {
      $em = $this->getDoctrine()->getManager();

      $entities = $em->getRepository('BenskiReservationBundle:Option\OptionReserve')->findAll();

      return $this->render('BenskiReservationBundle:Option/OptionReserve:index.html.twig', array(
                  'entities' => $entities,
      ));
   }

   /**
    * Finds and displays a Option\OptionReserve entity.
    *
    */
   public function showAction($id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiReservationBundle:Option\OptionReserve')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Option\OptionReserve entity.');
      }

      if ($entity instanceof OptionACocherReserve) {
         return $this->redirect($this->generateUrl('option_optionacocherreserve_show', array('id' => $id)));
      } elseif ($entity instanceof OptionChoixMultipleReserve) {
         return $this->redirect($this->generateUrl('option_optionchoixmultiplereserve_show', array('id' => $id)));
      } else throw new \LogicException("Comportement theoriquement impossible");
   }

}
