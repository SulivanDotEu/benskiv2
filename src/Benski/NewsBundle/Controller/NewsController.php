<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Benski\NewsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Benski\NewsBundle\Entity\News;
use Benski\NewsBundle\Form\NewsType;

class NewsController extends Controller {

    /**
     * Lists all News entities
     * 
     */
    
    public function indexAction() 
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BenskiNewsBundle:News')->findAll();
        
        return $this->render('BenskiNewsBundle:News:index.html.twig', array(
            'entities' => $entities
        ));

    }
    /**
     * Creates a new Appartement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new News();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('news_show', array('id' => $entity->getId())));
            
        }
        
        return $this->render('BenskiNewsBundle:News:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            
        ));

    }

    /**
    * Creates a form to create a Appartement entity.
    *
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(News $entity)
    {
        $form = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('news_create'),
            'method' => 'POST',
        ));
        
        $form->add('submit', 'submit', array('label' => 'Create'));
        return $form;
    }

    /**
     * Displays a form to create a new Appartement entity.
     *
     */
    public function newAction()
    {
        $entity = new News();
        $form = $this->createCreateForm($entity);
        
        return $this->render('BenskiNewsBundle:News:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
        

    }

    /**
     * Finds and displays a Appartement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BenskiNewsBundle:News')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity');
        }
        
        $deleteFrom = $this->createDeleteForm($id);
        
        return $this->render('BenskiNewsBundle:News:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteFrom->createView()
        ));


    }

    /**
     * Displays a form to edit an existing Appartement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BenskiNewsBundle:News')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('BenskiNewsBundle:News:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
    * Creates a form to edit a Appartement entity.
    *
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(News $entity)
    {
        $form = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('news_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        
        $form->add('submit', 'submit', array('label' => 'Update'));
        return $form;
    }
    /**
     * Edits an existing Appartement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BenskiNewsBundle:News')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity');
        }

        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest();
        
        if ($editForm->isValid()){
            $em->flush();
            return $this->render('BenskiNewsBundle:News:edit.html.twig', array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }
        
    }
    /**
     * Deletes a Appartement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);
        
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenskiNewsBundle:News')->find($id);
            
            if (!$entity) {
                   throw $this->createNotFoundException('Unable to find News entity');
            }
            
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('news'));
    }

    /**
     * Creates a form to delete a Appartement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                ->setAction($this->generateUrl('news_delete', array('id' =>$id)))
                ->setMethod('DELETE')
                ->add('submit', 'submit', array('label' => 'Delete'))
                ->getForm();
    }
}

?>
