<?php

namespace Benski\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\CatalogueBundle\Entity\Appartement;
use Benski\CatalogueBundle\Form\SejourAppartementType;
use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Entity\SejourAppartement;
use \Doctrine\DBAL\DBALException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Appartement controller.
 *
 */
class SejourAppartementController extends Controller
{
    /**
     * Lists all Appartement entities.
     * @Secure(roles="ROLE_ADMIN")
     */
    /*
      public function indexAction() {
      $em = $this->getDoctrine()->getManager();

      $entities = $em->getRepository('BenskiCatalogueBundle:Appartement')->findAll();

      return $this->render('BenskiCatalogueBundle:Appartement:index.html.twig', array(
      'entities' => $entities,
      ));
      }
     */

    /**
     * Creates a new Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request)
    {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

        $entity = new SejourAppartement();

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
    private function createCreateForm(SejourAppartement $sa)
    {

        $builder = $this->createFormBuilder($sa);
        $builder->add('appartement', 'entity', array(
            'class' => 'BenskiCatalogueBundle:Appartement',
            // 'property' => 'username',
        ));

        $builder->add('stock', 'integer');


        $builder->add('submit', 'submit', array('label' => 'Bind'));

        return $builder->getForm();
    }

    /**
     * Displays a form to create a new Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function bindAction(Sejour $sejour, Request $request)
    {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

        $entity = new SejourAppartement();
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
     * Finds and displays a Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:Appartement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenskiCatalogueBundle:Appartement:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     * @ParamConverter("appartement", class="BenskiCatalogueBundle:Appartement")
     * @ParamConverter("sejour", class="BenskiCatalogueBundle:Sejour")
     */
    public function editAction($sejour, $appartement, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:SejourAppartement')
            ->myFindByAppartementAndSejour($sejour, $appartement);
        /* @var $entity SejourAppartement */
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $editForm = $this->createEditForm($entity);
        //$deleteForm = $this->createDeleteForm($id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $data = $editForm->getData();
            $entity->setStock($data['stock']);
            $entity->setPublished($data['published']);
            for ($i = 1; $i <= $appartement->getNombreLits(); $i++) {
                $entity->definirPrix($i, $data['prix-' . $i]);
            }
            $em->flush();
            return $this->redirect($this->generateUrl('sejour_show', array('id' => $sejour->getId())));
        }

        return $this->render('BenskiCatalogueBundle:SejourAppartement:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/delete/{appartement}/{sejour}", name="sejour_appartement_delete")
     *
     * Deletes a Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     * @ParamConverter("appartement", class="BenskiCatalogueBundle:Appartement")
     * @ParamConverter("sejour", class="BenskiCatalogueBundle:Sejour")
     */
    public function deleteAction(Request $request, $sejour, $appartement)
    {
        $manager = $this->getDoctrine()->getManager();
        $em = $manager->getRepository('BenskiCatalogueBundle:SejourAppartement');

        $entity = $em->myFindByAppartementAndSejour($sejour, $appartement);
        /* @var $entity SejourAppartement */
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }
        $manager->remove($entity);
        $manager->flush();

        return $this->redirect($this->generateUrl('sejour_show', array('id' => $sejour->getId())));
    }

    /**
     * Creates a form to edit a Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     * @param Appartement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(SejourAppartement $entity)
    {

//        $type = new SejourAppartementType($entity);
//        $form = $this->createForm($type, $entity, array());
//        $form->add('submit', 'submit', array('label' => 'Update'));
//        return $form;


        $builder = $this->createFormBuilder();

        $builder->add('stock', 'integer', array(
            'data' => $entity->getStock(),
        ));
        $builder->add('published', 'checkbox', array(
            'data' => $entity->isPublished(),
            'required' => false

        ));
        for ($i = 1; $i <= $entity->getAppartement()->getNombreLits(); $i++) {
            $builder->add('prix-' . $i, 'money', array(
                'divisor' => 100,
                'label' => 'Prix par personne pour ' . $i . 'p',
                'data' => $entity->prixParPersonne($i),
            ));
        }
        $builder->add('submit', 'submit', array('label' => 'Update'));

        return $builder->getForm();
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @param \Benski\CatalogueBundle\Entity\SejourAppartement $entity
     * @return type
     */
    private function createEditForm2(SejourAppartement $entity)
    {


        $form = $this->createForm(new SejourAppartementType($entity), $entity, array(
            'action' => $this->generateUrl('sejour_appartement_edit', array('appartement' => $entity->getAppartement()->getId(),
                    'sejour' => $entity->getSejour()->getId())),
            'method' => 'PUT',
        ));

        /**
         * $builder = $this->createFormBuilder($sa);
         * $builder->add('appartement', 'entity', array(
         * 'class' => 'BenskiCatalogueBundle:Appartement',
         * // 'property' => 'username',
         * ));
         *
         * $builder->add('prix', 'integer');
         * $builder->add('stock', 'integer');
         *
         *
         *
         * $builder->add('submit', 'submit', array('label' => 'Bind'));
         */
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Appartement entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiCatalogueBundle:SejourAppartement')->find($id);

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
            ->getForm();
    }

}
