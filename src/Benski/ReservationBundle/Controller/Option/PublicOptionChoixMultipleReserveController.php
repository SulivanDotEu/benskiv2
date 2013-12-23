<?php

namespace Benski\ReservationBundle\Controller\Option;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\ReservationBundle\Entity\Option\OptionChoixMultipleReserve;
use Benski\ReservationBundle\Form\Option\OptionChoixMultipleReserveType;

/**
 * Option\OptionChoixMultipleReserve controller.
 *
 */
class PublicOptionChoixMultipleReserveController extends Controller {

   /**
    * Displays a form to edit an existing Option\OptionChoixMultipleReserve entity.
    *
    */
   public function editAction($id) {
      $em = $this->getDoctrine()->getManager();
      $entity = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->find($id);
      if (!$entity)
         throw $this->createNotFoundException('Unable to find Option\OptionChoixMultipleReserve entity.');
      $editForm = $this->createEditForm($entity);

      return $this->render(
                      'BenskiReservationBundle:Option/Public:edit_option_choixmultiple.html.twig', array(
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
      ));
   }

   /**
    * Creates a form to edit a Option\OptionChoixMultipleReserve entity.
    *
    * @param OptionChoixMultipleReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createEditForm(OptionChoixMultipleReserve $entity) {
      $form = $this->createForm(new OptionChoixMultipleReserveType(), $entity, array(
          'action' => $this->generateUrl('public_option_optionchoixmultiplereserve_update', array('id' => $entity->getId())),
          'method' => 'PUT',
      ));

      $form->add('submit', 'submit', array('label' => 'Update'));
      $form->remove('prix');

      return $form;
   }

   /**
    * Edits an existing Option\OptionChoixMultipleReserve entity.
    *
    */
   public function updateAction(Request $request, $id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->find($id);
      $choix = $em->getRepository('BenskiCatalogueBundle:Option\ChoixOptionMultiple')->find($_REQUEST['choice_id']);
      /* @var $entity OptionChoixMultipleReserve */
      $entity->setChoix($choix);
      $em->flush();
         return $this->redirect($this->generateUrl('public_reservation'));

      if ($editForm->isValid()) {
         $em->flush();
         return $this->redirect($this->generateUrl('public_reservation'));
         return $this->redirect($this->generateUrl('option_optionchoixmultiplereserve_edit', array('id' => $id)));
      }


      /*
        return $this->render('BenskiReservationBundle:Option/Pubic/OptionChoixMultipleReserve:edit.html.twig', array(
        'entity' => $entity,
        'edit_form' => $editForm->createView(),
        ));
       */
   }

}
