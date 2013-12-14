<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\ReservationBundle\Entity\SejourReserve;
use Benski\ReservationBundle\Form\SejourReserveType;

/**
 * SejourReserve controller.
 *
 */
class SejourReserveController extends Controller
{

    /**
     * Lists all SejourReserve entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiReservationBundle:SejourReserve')->findAll();

        return $this->render('BenskiReservationBundle:SejourReserve:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SejourReserve entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SejourReserve();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sejourreserve_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiReservationBundle:SejourReserve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SejourReserve entity.
    *
    * @param SejourReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SejourReserve $entity)
    {
        $form = $this->createForm(new SejourReserveType(), $entity, array(
            'action' => $this->generateUrl('sejourreserve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SejourReserve entity.
     *
     */
    public function newAction()
    {
        $entity = new SejourReserve();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiReservationBundle:SejourReserve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SejourReserve entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:SejourReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SejourReserve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiReservationBundle:SejourReserve:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SejourReserve entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:SejourReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SejourReserve entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiReservationBundle:SejourReserve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SejourReserve entity.
    *
    * @param SejourReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SejourReserve $entity)
    {
        $form = $this->createForm(new SejourReserveType(), $entity, array(
            'action' => $this->generateUrl('sejourreserve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SejourReserve entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:SejourReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SejourReserve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sejourreserve_edit', array('id' => $id)));
        }

        return $this->render('BenskiReservationBundle:SejourReserve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SejourReserve entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiReservationBundle:SejourReserve')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SejourReserve entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sejourreserve'));
    }

    /**
     * Creates a form to delete a SejourReserve entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sejourreserve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
