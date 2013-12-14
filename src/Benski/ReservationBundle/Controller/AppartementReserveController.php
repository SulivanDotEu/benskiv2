<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\ReservationBundle\Entity\AppartementReserve;
use Benski\ReservationBundle\Form\AppartementReserveType;

/**
 * AppartementReserve controller.
 *
 */
class AppartementReserveController extends Controller
{

    /**
     * Lists all AppartementReserve entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiReservationBundle:AppartementReserve')->findAll();

        return $this->render('BenskiReservationBundle:AppartementReserve:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new AppartementReserve entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AppartementReserve();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('appartementreserve_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiReservationBundle:AppartementReserve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a AppartementReserve entity.
    *
    * @param AppartementReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AppartementReserve $entity)
    {
        $form = $this->createForm(new AppartementReserveType(), $entity, array(
            'action' => $this->generateUrl('appartementreserve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AppartementReserve entity.
     *
     */
    public function newAction()
    {
        $entity = new AppartementReserve();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiReservationBundle:AppartementReserve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AppartementReserve entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:AppartementReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AppartementReserve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiReservationBundle:AppartementReserve:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing AppartementReserve entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:AppartementReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AppartementReserve entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiReservationBundle:AppartementReserve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AppartementReserve entity.
    *
    * @param AppartementReserve $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AppartementReserve $entity)
    {
        $form = $this->createForm(new AppartementReserveType(), $entity, array(
            'action' => $this->generateUrl('appartementreserve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AppartementReserve entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:AppartementReserve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AppartementReserve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('appartementreserve_edit', array('id' => $id)));
        }

        return $this->render('BenskiReservationBundle:AppartementReserve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AppartementReserve entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiReservationBundle:AppartementReserve')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AppartementReserve entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('appartementreserve'));
    }

    /**
     * Creates a form to delete a AppartementReserve entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appartementreserve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
