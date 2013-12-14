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
 * @Route("/admin/reservation")
 */
class ReservationImplController extends Controller
{

    /**
     * Lists all ReservationImpl entities.
     *
     * @Route("/", name="admin_reservation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiReservationBundle:ReservationImpl')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ReservationImpl entity.
     *
     * @Route("/", name="admin_reservation_create")
     * @Method("POST")
     * @Template("BenskiReservationBundle:ReservationImpl:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ReservationImpl();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_reservation_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ReservationImpl entity.
    *
    * @param ReservationImpl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ReservationImpl $entity)
    {
        $form = $this->createForm(new ReservationImplType(), $entity, array(
            'action' => $this->generateUrl('admin_reservation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ReservationImpl entity.
     *
     * @Route("/new", name="admin_reservation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ReservationImpl();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ReservationImpl entity.
     *
     * @Route("/{id}", name="admin_reservation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationImpl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationImpl entity.');
        }

        
        if($entity instanceof ReservationSejour){
            return $this->redirect($this->generateUrl('admin_reservation_sejour', array(
                'id' => $entity->getId()
            )));
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ReservationImpl entity.
     *
     * @Route("/{id}/edit", name="admin_reservation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationImpl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationImpl entity.');
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
    * Creates a form to edit a ReservationImpl entity.
    *
    * @param ReservationImpl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ReservationImpl $entity)
    {
        $form = $this->createForm(new ReservationImplType(), $entity, array(
            'action' => $this->generateUrl('admin_reservation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ReservationImpl entity.
     *
     * @Route("/{id}", name="admin_reservation_update")
     * @Method("PUT")
     * @Template("BenskiReservationBundle:ReservationImpl:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:ReservationImpl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReservationImpl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_reservation_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ReservationImpl entity.
     *
     * @Route("/{id}", name="admin_reservation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiReservationBundle:ReservationImpl')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ReservationImpl entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_reservation'));
    }

    /**
     * Creates a form to delete a ReservationImpl entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_reservation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
