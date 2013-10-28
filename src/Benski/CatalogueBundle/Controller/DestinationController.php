<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\CatalogueBundle\Entity\Destination;
use Benski\CatalogueBundle\Form\DestinationType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


/**
 * Destination controller.
 *
 */
class DestinationController extends Controller
{

    /**
     * Lists all Destination entities.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction()
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Destination')->findAll();

        return $this->render('BenskiCatalogueBundle:Destination:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Creates a new Destination entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $entity = new Destination();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('destination_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiCatalogueBundle:Destination:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Destination entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Destination $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Destination $entity)
    {
        $form = $this->createForm(new DestinationType(), $entity, array(
            'action' => $this->generateUrl('destination_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Destination entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction()
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $entity = new Destination();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiCatalogueBundle:Destination:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Destination entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function showAction($id)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Destination')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Destination entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Destination:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Destination entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction($id)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Destination')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Destination entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Destination:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Destination entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Destination $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Destination $entity)
    {
        $form = $this->createForm(new DestinationType(), $entity, array(
            'action' => $this->generateUrl('destination_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Destination entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Destination')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Destination entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('destination_edit', array('id' => $id)));
        }

        return $this->render('BenskiCatalogueBundle:Destination:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Destination entity.
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
            $entity = $em->getRepository('BenskiCatalogueBundle:Destination')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Destination entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('destination'));
    }

    /**
     * Creates a form to delete a Destination entity by id.
     * @Secure(roles="ROLE_ADMIN")
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('destination_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
