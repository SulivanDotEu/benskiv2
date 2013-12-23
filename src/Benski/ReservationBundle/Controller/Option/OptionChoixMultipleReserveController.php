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
class OptionChoixMultipleReserveController extends Controller
{

    /**
     * Lists all Option\OptionChoixMultipleReserve entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->findAll();

        return $this->render('BenskiReservationBundle:Option/OptionChoixMultipleReserve:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Option\OptionChoixMultipleReserve entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OptionChoixMultipleReserve();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('option_optionchoixmultiplereserve_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiReservationBundle:Option/OptionChoixMultipleReserve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Option\OptionChoixMultipleReserve entity.
    *
    * @param OptionChoixMultipleReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(OptionChoixMultipleReserve $entity)
    {
        $form = $this->createForm(new OptionChoixMultipleReserveType(), $entity, array(
            'action' => $this->generateUrl('option_optionchoixmultiplereserve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Option\OptionChoixMultipleReserve entity.
     *
     */
    public function newAction()
    {
        $entity = new OptionChoixMultipleReserve();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiReservationBundle:Option/OptionChoixMultipleReserve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Option\OptionChoixMultipleReserve entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Option\OptionChoixMultipleReserve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiReservationBundle:Option/OptionChoixMultipleReserve:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Option\OptionChoixMultipleReserve entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Option\OptionChoixMultipleReserve entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiReservationBundle:Option/OptionChoixMultipleReserve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Option\OptionChoixMultipleReserve entity.
    *
    * @param OptionChoixMultipleReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OptionChoixMultipleReserve $entity)
    {
        $form = $this->createForm(new OptionChoixMultipleReserveType(), $entity, array(
            'action' => $this->generateUrl('option_optionchoixmultiplereserve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Option\OptionChoixMultipleReserve entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Option\OptionChoixMultipleReserve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('option_optionchoixmultiplereserve_edit', array('id' => $id)));
        }

        return $this->render('BenskiReservationBundle:Option/OptionChoixMultipleReserve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Option\OptionChoixMultipleReserve entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiReservationBundle:Option\OptionChoixMultipleReserve')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Option\OptionChoixMultipleReserve entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('option_optionchoixmultiplereserve'));
    }

    /**
     * Creates a form to delete a Option\OptionChoixMultipleReserve entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('option_optionchoixmultiplereserve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
