<?php

namespace Benski\CatalogueBundle\Controller\Option;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\CatalogueBundle\Entity\Option\OptionACocher;
use Benski\CatalogueBundle\Form\Option\OptionACocherType;

/**
 * Option\OptionACocher controller.
 *
 */
class OptionACocherController extends Controller
{

    /**
     * Lists all Option\OptionACocher entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Option\OptionACocher')->findAll();

        return $this->render('BenskiCatalogueBundle:Option/OptionACocher:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Option\OptionACocher entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OptionACocher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('option_optionacocher_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiCatalogueBundle:Option/OptionACocher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Option\OptionACocher entity.
    *
    * @param OptionACocher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(OptionACocher $entity)
    {
        $form = $this->createForm(new OptionACocherType(), $entity, array(
            'action' => $this->generateUrl('option_optionacocher_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Option\OptionACocher entity.
     *
     */
    public function newAction()
    {
        $entity = new OptionACocher();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiCatalogueBundle:Option/OptionACocher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Option\OptionACocher entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionACocher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Option\OptionACocher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Option/OptionACocher:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Option\OptionACocher entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionACocher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Option\OptionACocher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Option/OptionACocher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Option\OptionACocher entity.
    *
    * @param OptionACocher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OptionACocher $entity)
    {
        $form = $this->createForm(new OptionACocherType(), $entity, array(
            'action' => $this->generateUrl('option_optionacocher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Option\OptionACocher entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionACocher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Option\OptionACocher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('option_optionacocher_edit', array('id' => $id)));
        }

        return $this->render('BenskiCatalogueBundle:Option/OptionACocher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Option\OptionACocher entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionACocher')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Option\OptionACocher entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('option_optionacocher'));
    }

    /**
     * Creates a form to delete a Option\OptionACocher entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('option_optionacocher_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
