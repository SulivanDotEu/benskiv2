<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Benski\ReservationBundle\Entity\Paiement;
use Benski\ReservationBundle\Form\PaiementType;

/**
 * Paiement controller.
 *
 * @Route("/paiement")
 */
class PaiementController extends Controller
{

    /**
     * Lists all Paiement entities.
     *
     * @Route("/", name="admin_paiement")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiReservationBundle:Paiement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Paiement entity.
     *
     * @Route("/", name="admin_paiement_create")
     * @Method("POST")
     * @Template("BenskiReservationBundle:Paiement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Paiement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_paiement_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Paiement entity.
    *
    * @param Paiement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Paiement $entity)
    {
        $form = $this->createForm(new PaiementType(), $entity, array(
            'action' => $this->generateUrl('admin_paiement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Paiement entity.
     *
     * @Route("/new", name="admin_paiement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Paiement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Paiement entity.
     *
     * @Route("/{id}", name="admin_paiement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:Paiement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paiement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Paiement entity.
     *
     * @Route("/{id}/edit", name="admin_paiement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:Paiement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paiement entity.');
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
    * Creates a form to edit a Paiement entity.
    *
    * @param Paiement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Paiement $entity)
    {
        $form = $this->createForm(new PaiementType(), $entity, array(
            'action' => $this->generateUrl('admin_paiement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Paiement entity.
     *
     * @Route("/{id}", name="admin_paiement_update")
     * @Method("PUT")
     * @Template("BenskiReservationBundle:Paiement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiReservationBundle:Paiement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paiement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_paiement_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Paiement entity.
     *
     * @Route("/{id}", name="admin_paiement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiReservationBundle:Paiement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Paiement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_paiement'));
    }

    /**
     * Creates a form to delete a Paiement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_paiement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
