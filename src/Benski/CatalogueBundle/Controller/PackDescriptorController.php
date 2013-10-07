<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\CatalogueBundle\Entity\PackDescriptor;
use Benski\CatalogueBundle\Form\PackDescriptorType;

/**
 * PackDescriptor controller.
 *
 */
class PackDescriptorController extends Controller
{

    /**
     * Lists all PackDescriptor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:PackDescriptor')->findAll();

        return $this->render('BenskiCatalogueBundle:PackDescriptor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PackDescriptor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PackDescriptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('packdescriptor_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiCatalogueBundle:PackDescriptor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a PackDescriptor entity.
    *
    * @param PackDescriptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PackDescriptor $entity)
    {
        $form = $this->createForm(new PackDescriptorType(), $entity, array(
            'action' => $this->generateUrl('packdescriptor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PackDescriptor entity.
     *
     */
    public function newAction()
    {
        $entity = new PackDescriptor();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiCatalogueBundle:PackDescriptor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PackDescriptor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:PackDescriptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PackDescriptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:PackDescriptor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PackDescriptor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:PackDescriptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PackDescriptor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:PackDescriptor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PackDescriptor entity.
    *
    * @param PackDescriptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PackDescriptor $entity)
    {
        $form = $this->createForm(new PackDescriptorType(), $entity, array(
            'action' => $this->generateUrl('packdescriptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PackDescriptor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:PackDescriptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PackDescriptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('packdescriptor_edit', array('id' => $id)));
        }

        return $this->render('BenskiCatalogueBundle:PackDescriptor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PackDescriptor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiCatalogueBundle:PackDescriptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PackDescriptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('packdescriptor'));
    }

    /**
     * Creates a form to delete a PackDescriptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('packdescriptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
