<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\CatalogueBundle\Entity\Appartement;
use Benski\CatalogueBundle\Form\AppartementType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


/**
 * Appartement controller.
 *
 */
class AppartementController extends Controller
{

   
    /**
     * Lists all Appartement entities.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction()
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Appartement')->findAll();
        
        return $this->render('BenskiCatalogueBundle:Appartement:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $entity = new Appartement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('appartement_show', array('id' => $entity->getId())));
        }

        return $this->render('BenskiCatalogueBundle:Appartement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Appartement $entity)
    {
        $form = $this->createForm(new AppartementType(), $entity, array(
            'action' => $this->generateUrl('appartement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction()
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $entity = new Appartement();
        $form   = $this->createCreateForm($entity);

        return $this->render('BenskiCatalogueBundle:Appartement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Appartement entity.
     *
     */
    public function showAction($id)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Appartement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Appartement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction($id)
    {
        
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Appartement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Appartement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Appartement $entity)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        
        $form = $this->createForm(new AppartementType(), $entity, array(
            'action' => $this->generateUrl('appartement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Appartement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('appartement_edit', array('id' => $id)));
        }

        return $this->render('BenskiCatalogueBundle:Appartement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Appartement entity.
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
            $entity = $em->getRepository('BenskiCatalogueBundle:Appartement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Appartement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('appartement'));
    }

    /**
     * Creates a form to delete a Appartement entity by id.
     * @Secure(roles="ROLE_ADMIN")
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appartement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
