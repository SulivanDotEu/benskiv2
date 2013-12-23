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
class PublicOptionReserveController extends Controller {

   public function editAction($id) {
      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('BenskiReservationBundle:Option\OptionReserve');
      $entity = $repository->find($id);
      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Option\OptionReserve entity.');
      }
      
      if ($entity instanceof OptionACocherReserve) {
         return $this->redirect($this->generateUrl('public_option_optionacocherreserve_edit', array('id' => $id)));
      } elseif ($entity instanceof OptionChoixMultipleReserve) {
         return $this->redirect($this->generateUrl('public_option_optionchoixmultiplereserve_edit', array('id' => $id)));
      } else throw new \LogicException("Comportement theoriquement impossible");
   }
}
