<?php

namespace Benski\CatalogueBundle\Controller;

use Benski\CatalogueBundle\Entity\Pack;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\CatalogueBundle\Entity\Appartement;
use Benski\CatalogueBundle\Form\SejourAppartementType;
use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Entity\SejourPack;
use \Doctrine\DBAL\DBALException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Appartement controller.
 *
 */
class SejourPackController extends Controller {

   /**
    * Creates a new Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    */
   public function createAction(Request $request) {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
      $entity = new SejourPack();

      $form = $this->createCreateForm($entity);
      $form->handleRequest($request);

      if ($form->isValid()) {
         $data = $form->getData();

         //$em = $this->getDoctrine()->getManager();
         //$em->persist($entity);
         //$em->flush();

         return $this->redirect($this->generateUrl('appartement_show', array('id' => $entity->getId())));
      }

      return $this->render('BenskiCatalogueBundle:Sejour:bindAppartement.html.twig', array(
                  'entity' => $entity,
                  'form' => $form->createView(),
              ));
   }

   /**
    * Creates a form to create a Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createCreateForm(SejourPack $sp) {
      $builder = $this->createFormBuilder($sp);
      $builder->add('pack', 'entity', array(
          'class' => 'BenskiCatalogueBundle:Pack',
              // 'property' => 'username',
      ));
      $builder->add('submit', 'submit', array('label' => 'Bind'));

      return $builder->getForm();
   }

   /**
    * Displays a form to create a new Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    */
   public function bindAction(Sejour $sejour, Request $request) {
      $entity = new SejourPack();
      $entity->setSejour($sejour);
      $form = $this->createCreateForm($entity);

      $form->handleRequest($request);

      if ($form->isValid()) {
         try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('sejour_show', array('id' => $sejour->getId())));
         } catch (DBALException $e) {
            $error = array();
            $error['type'] = 'error';
            $error['title'] = 'Erreur !';
            $error['content'] = "Il existe deja une relation entre ce séjour et cet 
               appartement. Il n'est pas possible d'en créer 2.";
            $error['exception_dump'] = $e->getMessage();
            $this->get('session')->getFlashBag()->add('notification', $error);
                     return $this->redirect($this->generateUrl('sejour_show', array('id' => $sejour->getId())));

         }
      }

      return $this->render('BenskiCatalogueBundle:Sejour:bindAppartement.html.twig', array(
                  'entity' => $entity,
                  'form' => $form->createView(),
              ));
   }


   /**
    * @todo
    * @ParamConverter("pack", class="BenskiCatalogueBundle:Pack")
    * @ParamConverter("sejour", class="BenskiCatalogueBundle:Sejour")
    * @Route("/edit/sejour-{sejour}/pack-{pack}")
    */
   public function editAction(Sejour $sejour, Pack $pack, Request $request) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiCatalogueBundle:SejourPack')
              ->myFindBySejourAndPack($sejour, $pack);
      /* @var $entity SejourPack */
      if (!$entity) {
         throw $this->createNotFoundException('Unable to find SejourPack entity.');
      }

      $editForm = $this->createEditForm($entity);
      //$deleteForm = $this->createDeleteForm($id);
      $editForm->handleRequest($request);

      if ($editForm->isValid()) {
         $data = $editForm->getData();
         $entity->setStock($data['stock']);
         for ($i = 1; $i <= $appartement->getNombreLits(); $i++) {
            $entity->definirPrix($i, $data['prix-' . $i]);
         }
         $em->flush();
         return $this->redirect($this->generateUrl('sejour_show', array('id' => $sejour->getId())));
      }

      return $this->render('BenskiCatalogueBundle:SejourPack:edit.html.twig', array(
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
                      //'delete_form' => $deleteForm->createView(),
              ));
   }

   /**
    * @todo
    * Creates a form to edit a Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createEditForm(SejourPack $entity) {
      $builder = $this->createFormBuilder();
      $builder->add('stock', 'integer', array(
          'data' => $entity->getStock(),
      ));
      for ($i = 1; $i <= $entity->getAppartement()->getNombreLits(); $i++) {
         $builder->add('prix-' . $i . '', 'money', array(
             'divisor' => 100,
             'label' => 'Prix par personne pour ' . $i . 'p',
             'data' => $entity->prixParPersonne($i),
         ));
      }
      $builder->add('submit', 'submit', array('label' => 'Update'));

      return $builder->getForm();
   }

   /**
    * @todo
    * Edits an existing Appartement entity.
    * @Secure(roles="ROLE_ADMIN")
    */
   public function updateAction(Request $request, $id) {
       
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) 
        {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }
        
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('BenskiCatalogueBundle:SejourPack')->find($id);

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
                  'entity' => $entity,
                  'edit_form' => $editForm->createView(),
                  'delete_form' => $deleteForm->createView(),
              ));
   }

    /**
     * @ParamConverter("pack", class="BenskiCatalogueBundle:Pack")
     * @ParamConverter("sejour", class="BenskiCatalogueBundle:Sejour")
     * @Route("/delete/sejour-{sejour}/pack-{pack}", name="sejour_pack_delete")
     */
   public function deleteAction(Pack $pack, Sejour $sejour, Request $request) {
       $em = $this->getDoctrine()->getManager();

       $entity = $em->getRepository('BenskiCatalogueBundle:SejourPack')
           ->myFindBySejourAndPack($sejour, $pack);
       /* @var $entity SejourPack */
       if (!$entity) {
           throw $this->createNotFoundException('Unable to find SejourPack entity.');
       }
       $em->remove($entity);
       $em->flush();

      return $this->redirect($this->generateUrl('sejour_show', array('id' => $sejour->getId())));
   }

   /**
    * Creates a form to delete a Appartement entity by id.
    * @Secure(roles="ROLE_ADMIN")
    * @param mixed $id The entity id
    *
    * @return \Symfony\Component\Form\Form The form
    */
   private function createDeleteForm($id) {
      return $this->createFormBuilder()
                      ->setAction($this->generateUrl('appartement_delete', array('id' => $id)))
                      ->setMethod('DELETE')
                      ->add('submit', 'submit', array('label' => 'Delete'))
                      ->getForm()
      ;
   }

}
