<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Benski\ReservationBundle\Entity\ReservationSejour;
use Benski\ReservationBundle\Form\ReservationSejourType;

/**
 * ReservationSejour controller.
 *
 * @Route("/admin/reservation-sejour")
 */
class ReservationSejourController extends Controller
{

    /**
     * Lists all ReservationSejour entities.
     *
     * @Route("/", name="admin_reservation-sejour")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiReservationBundle:ReservationSejour')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ReservationSejour entity.
     *
     * @Route("/", name="admin_reservation-sejour_create")
     * @Method("POST")
     * @Template("BenskiReservationBundle:ReservationSejour:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ReservationSejour();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_reservation_sejour', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ReservationSejour entity.
    *
    * @param ReservationSejour $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ReservationSejour $entity)
    {
        $form = $this->createForm(new ReservationSejourType(), $entity, array(
            'action' => $this->generateUrl('admin_reservation-sejour_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ReservationSejour entity.
     *
     * @Route("/new", name="admin_reservation-sejour_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ReservationSejour();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ReservationSejour entity.
     *
     * @Route("/{id}", name="admin_reservation_sejour")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationSejour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationSejour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ReservationSejour entity.
     *
     * @Route("/{id}/edit", name="admin_reservation-sejour_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationSejour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationSejour entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ReservationSejour entity.
    *
    * @param ReservationSejour $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ReservationSejour $entity)
    {
        $form = $this->createForm(new ReservationSejourType(), $entity, array(
            'action' => $this->generateUrl('admin_reservation-sejour_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ReservationSejour entity.
     *
     * @Route("/{id}", name="admin_reservation-sejour_update")
     * @Method("PUT")
     * @Template("BenskiReservationBundle:ReservationSejour:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationSejour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationSejour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_reservation-sejour_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ReservationSejour entity.
     *
     * @Route("/{id}", name="admin_reservation-sejour_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiReservationBundle:ReservationSejour')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ReservationSejour entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_reservation-sejour'));
    }

    /**
     * Creates a form to delete a ReservationSejour entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_reservation-sejour_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
