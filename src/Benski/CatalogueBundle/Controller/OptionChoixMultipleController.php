<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;
use Benski\CatalogueBundle\Form\OptionChoixMultipleType;
use Benski\CatalogueBundle\Form\Option\ChoixOptionMultipleType;

/**
 * OptionChoixMultiple controller.
 *
 */
class OptionChoixMultipleController extends Controller {

    /**
     * Lists all OptionChoixMultiple entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Option\OptionChoixMultiple')->findAll();

        return $this->render('BenskiCatalogueBundle:OptionChoixMultiple:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new OptionChoixMultiple entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new OptionChoixMultiple();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $choix = $entity->getChoix();
            foreach ($choix as $c){
                $c->setOptionChoixMultiple($entity);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('optionchoixmultiple_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiCatalogueBundle:OptionChoixMultiple:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OptionChoixMultiple entity.
     *
     * @param OptionChoixMultiple $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OptionChoixMultiple $entity) {
        $form = $this->createForm(new OptionChoixMultipleType(), $entity, array(
            'action' => $this->generateUrl('optionchoixmultiple_create'),
            'method' => 'POST',
        ));
        

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OptionChoixMultiple entity.
     *
     */
    public function newAction() {
        $entity = new OptionChoixMultiple();
        $form = $this->createCreateForm($entity);

        return $this->render('BenskiCatalogueBundle:OptionChoixMultiple:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OptionChoixMultiple entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionChoixMultiple')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OptionChoixMultiple entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:OptionChoixMultiple:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing OptionChoixMultiple entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionChoixMultiple')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OptionChoixMultiple entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:OptionChoixMultiple:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a OptionChoixMultiple entity.
     *
     * @param OptionChoixMultiple $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(OptionChoixMultiple $entity) {
        $form = $this->createForm(new OptionChoixMultipleType(), $entity, array(
            'action' => $this->generateUrl('optionchoixmultiple_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        $form->remove('choix');
        
        foreach ($entity->getChoix() as $choix) {
            //$form->add('choix', new ChoixOptionMultipleType());
        }
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing OptionChoixMultiple entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionChoixMultiple')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OptionChoixMultiple entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('optionchoixmultiple_edit', array('id' => $id)));
        }

        return $this->render('BenskiCatalogueBundle:OptionChoixMultiple:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OptionChoixMultiple entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiCatalogueBundle:Option\OptionChoixMultiple')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OptionChoixMultiple entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('optionchoixmultiple'));
    }

    /**
     * Creates a form to delete a OptionChoixMultiple entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('optionchoixmultiple_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
