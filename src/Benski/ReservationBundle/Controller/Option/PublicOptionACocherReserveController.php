<?php

namespace Benski\ReservationBundle\Controller\Option;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\ReservationBundle\Entity\Option\OptionACocherReserve;
use Benski\ReservationBundle\Form\Option\OptionACocherReserveType;

/**
 * Option\OptionACocherReserve controller.
 *
 */
class PublicOptionACocherReserveController extends Controller {

   public function editAction($id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiReservationBundle:Option\OptionACocherReserve')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Option\OptionACocherReserve entity.');
      }

      $editForm = $this->createEditForm($entity);
      $deleteForm = $this->createDeleteForm($id);

      return $this->render('BenskiReservationBundle:Option/Pubic/OptionACocherReserve:edit.html.twig', array(
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
      ));
   }

   /**
    * Creates a form to edit a Option\OptionACocherReserve entity.
    *
    * @param OptionACocherReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createEditForm(OptionACocherReserve $entity) {
      $form = $this->createForm(new OptionACocherReserveType(), $entity, array(
          'action' => $this->generateUrl('public_option_optionacocherreserve_update', array('id' => $entity->getId())),
          'method' => 'PUT',
      ));

      $form->add('submit', 'submit', array('label' => 'Update'));

      return $form;
   }

   /**
    * Edits an existing Option\OptionACocherReserve entity.
    *
    */
   public function updateAction(Request $request, $id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiReservationBundle:Option\OptionACocherReserve')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Option\OptionACocherReserve entity.');
      }

      $editForm = $this->createEditForm($entity);
      $editForm->handleRequest($request);

      if ($editForm->isValid()) {
         $em->flush();

         return $this->redirect($this->generateUrl('public_reservation'));
         return $this->redirect($this->generateUrl('option_optionacocherreserve_edit', array('id' => $id)));
      }



      return $this->render('BenskiReservationBundle:Option/Pubic:edit.html.twig', array(
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
      ));
   }

}
