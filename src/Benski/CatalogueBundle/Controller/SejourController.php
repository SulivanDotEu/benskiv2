<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Form\SejourType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
/**
 * Sejour controller.
 *
 */
class SejourController extends Controller
{

    /**
     * Lists all Sejour entities.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Sejour')->findAll();

        return $this->render('BenskiCatalogueBundle:Sejour:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Sejour entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request)
    {

        $entity = new Sejour();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sejour_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiCatalogueBundle:Sejour:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Sejour entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Sejour $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Sejour $entity)
    {
        $form = $this->createForm(new SejourType(), $entity, array(
            'action' => $this->generateUrl('sejour_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sejour entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $entity = new Sejour();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiCatalogueBundle:Sejour:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sejour entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function showAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Sejour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sejour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Sejour:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Sejour entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Sejour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sejour entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Sejour:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Sejour entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Sejour $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sejour $entity)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $form = $this->createForm(new SejourType(), $entity, array(
            'action' => $this->generateUrl('sejour_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sejour entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Sejour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sejour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sejour_edit', array('id' => $id)));
        }

        return $this->render('BenskiCatalogueBundle:Sejour:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Sejour entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction(Request $request, $id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiCatalogueBundle:Sejour')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sejour entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sejour'));
    }

    /**
     * Creates a form to delete a Sejour entity by id.
     * @Secure(roles="ROLE_ADMIN")
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sejour_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
