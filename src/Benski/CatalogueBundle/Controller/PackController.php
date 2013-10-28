<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\CatalogueBundle\Entity\Pack;
use Benski\CatalogueBundle\Form\PackType;
use Benski\CatalogueBundle\Form\PackOptionACocherType;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;
use Benski\CatalogueBundle\Form\PackOptionChoixMutlipleType;
use Benski\CatalogueBundle\Entity\PackOptionChoixMultiple;
use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;
use Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple;

/**
 * Pack controller.
 *
 */
class PackController extends Controller {

   private $packId;

   public function createFormSelectOption() {
      $builder = $this->createFormBuilder(null, array(
                  'action' => $this->generateUrl('pack_bind_option_form', array(
                      'packId' => $this->packId,
                  )),
                  'method' => 'POST',
              ))
              ->add('option', 'entity', array(
                  'class' => 'BenskiCatalogueBundle:Option\AbstractOption',
                      // 'property' => 'username',
              ))
              ->add('bind', 'submit', array('label' => 'Bind'));
      return $builder->getForm();
   }

   public function createFormBindOption($entity) {
      if ($entity instanceof \Benski\CatalogueBundle\Entity\Option\OptionACocher)
         $form = $this->createFormBindOptionACocher($entity);
      if ($entity instanceof \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple)
         $form = $this->createFormBindOptionChoixMutliple($entity);
      $form->add('submit', 'submit', array('label' => 'Create'));
      return $form;
   }

   public function createFormBindOptionChoixMutliple($entity) {
      $option = $entity;
      /* @var $option \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple */
      $entity = new \Benski\CatalogueBundle\Entity\PackOptionChoixMultiple();
      $entity->setAbstractOption($option);
      $form = $this->createFormBuilder(null, array(
          'action' => $this->generateUrl('pack_bind_option_create', array(
              'packId' => $this->packId,
              'id' => $option->getId(),
          )),
          'method' => 'POST',
              ));

      foreach ($option->getChoix() as $choix) {
         /* @var $choix \Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple */
         $form->add($choix->getId() . '', 'money', array(
             'divisor' => 100,
             'label' => 'Prix pour "' . $choix->getIntitule() . '"',
             'data' => $choix->getPrix(),
         ));
      }

      return $form->getForm();
   }

   public function createFormBindOptionACocher($entity) {
      $option = $entity;
      $entity = new \Benski\CatalogueBundle\Entity\PackOptionACocher();
      $entity->setAbstractOption($option);
      $form = $this->createForm(new PackOptionACocherType(), $entity, array(
          'action' => $this->generateUrl('pack_bind_option_create', array(
              'packId' => $this->packId,
              'id' => $option->getId(),
          )),
          'method' => 'POST',
              ));
      $form->add('abstractOption', 'entity', array(
          'read_only' => true,
          'class' => 'BenskiCatalogueBundle:Option\AbstractOption',
      ));

      return $form;
   }

   public function bindOptionFormAction($packId, Request $request) {
      $this->packId = $packId;
      $form = $this->createFormSelectOption();
      $form->handleRequest($request);

      if ($form->isValid()) {
         $option = $form->getData()['option'];
         $form = $this->createFormBindOption($option);
         //$em = $this->getDoctrine()->getManager();
         //$entity = $em->getRepository('BenskiCatalogueBundle:Option\AbstractOption')->find($id);
      }
      return $this->render('BenskiCatalogueBundle:Pack:new.html.twig', array(
                  'form' => $form->createView(),
              ));
   }

   public function createBindOptionAction($packId, AbstractOption $option, Request $request) {
      $this->packId = $packId;


      $form = $this->createFormBindOption($option);
      $form->handleRequest($request);

      if ($form->isValid()) {
         $entity = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $pack = $em->getRepository('BenskiCatalogueBundle:Pack')->find($packId);
         if ($option instanceof \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple)
            $this->createBindOptionChoixMultipleAction($pack, $option, $form);
         /* @var $entity \Benski\CatalogueBundle\Entity\PackOption */
         else {
            $entity->setPack($pack);
            if (!$entity) {
               throw $this->createNotFoundException('Unable to find Pack entity.');
            }
            $em->persist($entity);
            $em->flush();
         }
         return $this->redirect($this->generateUrl('pack_show', array('id' => $pack->getId())));
      }
   }

   public function createBindOptionChoixMultipleAction($pack, AbstractOption $option, $form) {
      $data = $form->getData();
      if (!$option instanceof \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple)
         throw new \Exception('PackControllerException : createBindOptionChoixMultipleAction
            avec une option d\un type différent de \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple');
      /* @var $option OptionChoixMultiple */
      $entity = new PackOptionChoixMultiple();
      $entity->setAbstractOption($option);
      $entity->setPack($pack);
      foreach ($option->getChoix() as $choix) {
         $prix = $data[$choix->getId()];
         $prixOption = new PrixOptionChoixMultiple();
         $prixOption->setPrix($prix);
         $prixOption->setPackOption($entity);
         $prixOption->setChoix($choix);
         $entity->addPrixOption($prixOption);
      }

      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      //var_dump($entity);
      //die();
      $em->flush();
   }

   /**
    * Lists all Pack entities.
    *
    */
   public function indexAction() {
      $em = $this->getDoctrine()->getManager();

      $entities = $em->getRepository('BenskiCatalogueBundle:Pack')->findAll();

      return $this->render('BenskiCatalogueBundle:Pack:index.html.twig', array(
                  'entities' => $entities,
              ));
   }

   /**
    * Creates a new Pack entity.
    *
    */
   public function createAction(Request $request) {
      $entity = new Pack();
      $form = $this->createCreateForm($entity);
      $form->handleRequest($request);

      if ($form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $em->persist($entity);
         $em->flush();

         return $this->redirect($this->generateUrl('pack_show', array('id' => $entity->getId())));
      }

      return $this->render('BenskiCatalogueBundle:Pack:new.html.twig', array(
                  'entity' => $entity,
                  'form' => $form->createView(),
              ));
   }

   /**
    * Creates a form to create a Pack entity.
    *
    * @param Pack $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createCreateForm(Pack $entity) {
      $form = $this->createForm(new PackType(), $entity, array(
          'action' => $this->generateUrl('pack_create'),
          'method' => 'POST',
              ));

      $form->add('submit', 'submit', array('label' => 'Create'));

      return $form;
   }

   /**
    * Displays a form to create a new Pack entity.
    *
    */
   public function newAction() {
      $entity = new Pack();
      $form = $this->createCreateForm($entity);

      return $this->render('BenskiCatalogueBundle:Pack:new.html.twig', array(
                  'entity' => $entity,
                  'form' => $form->createView(),
              ));
   }

   /**
    * Finds and displays a Pack entity.
    *
    */
   public function showAction($id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiCatalogueBundle:Pack')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Pack entity.');
      }

      $deleteForm = $this->createDeleteForm($id);

      return $this->render('BenskiCatalogueBundle:Pack:show.html.twig', array(
                  'entity' => $entity,
                  'delete_form' => $deleteForm->createView(),));
   }

   /**
    * Displays a form to edit an existing Pack entity.
    *
    */
   public function editAction($id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiCatalogueBundle:Pack')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Pack entity.');
      }

      $editForm = $this->createEditForm($entity);
      $deleteForm = $this->createDeleteForm($id);

      return $this->render('BenskiCatalogueBundle:Pack:edit.html.twig', array(
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
                  'delete_form' => $deleteForm->createView(),
              ));
   }

   /**
    * Creates a form to edit a Pack entity.
    *
    * @param Pack $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createEditForm(Pack $entity) {
      $form = $this->createForm(new PackType(), $entity, array(
          'action' => $this->generateUrl('pack_update', array('id' => $entity->getId())),
          'method' => 'PUT',
              ));

      $form->add('submit', 'submit', array('label' => 'Update'));

      return $form;
   }

   /**
    * Edits an existing Pack entity.
    *
    */
   public function updateAction(Request $request, $id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiCatalogueBundle:Pack')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Pack entity.');
      }

      $deleteForm = $this->createDeleteForm($id);
      $editForm = $this->createEditForm($entity);
      $editForm->handleRequest($request);

      if ($editForm->isValid()) {
         $em->flush();

         return $this->redirect($this->generateUrl('pack_edit', array('id' => $id)));
      }

      return $this->render('BenskiCatalogueBundle:Pack:edit.html.twig', array(
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
                  'delete_form' => $deleteForm->createView(),
              ));
   }

   /**
    * Deletes a Pack entity.
    *
    */
   public function deleteAction(Request $request, $id) {
      $form = $this->createDeleteForm($id);
      $form->handleRequest($request);

      if ($form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $entity = $em->getRepository('BenskiCatalogueBundle:Pack')->find($id);

         if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pack entity.');
         }

         $em->remove($entity);
         $em->flush();
      }

      return $this->redirect($this->generateUrl('pack'));
   }

   /**
    * Creates a form to delete a Pack entity by id.
    *
    * @param mixed $id The entity id
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createDeleteForm($id) {
      return $this->createFormBuilder()
                      ->setAction($this->generateUrl('pack_delete', array('id' => $id)))
                      ->setMethod('DELETE')
                      ->add('submit', 'submit', array('label' => 'Delete'))
                      ->getForm()
      ;
   }

}
