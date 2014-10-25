<?php

namespace Benski\CatalogueBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Benski\CatalogueBundle\Entity\PackOption;

/**
 * Pack controller.
 */
class PackController extends Controller {

    private $packId;

    /**
     * @Route("/{pack}/update/option/{option}", name="pack_bind_option_update")
     *
     * @Secure(roles="ROLE_ADMIN")
     * @ParamConverter("pack",      class="BenskiCatalogueBundle:Pack")
     * @ParamConverter("option",    class="BenskiCatalogueBundle:Option\AbstractOption")
     */
    public function updateBindOptionAction(Request $request, $pack, $option) {

        if ($option instanceof \Benski\CatalogueBundle\Entity\Option\OptionACocher)
            return $this->updateBindOptionACocher($request, $pack, $option);
        if ($option instanceof \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple)
            return $this->updateBindOptionChoixMultiple($request, $pack, $option);
    }

    public function updateBindOptionACocher(Request $request, $pack, $option) {
        $packOption = $pack->getPackOption($option);
        $editForm = $this->createFormEditBindOptionACocher($packOption);

        $em = $this->getDoctrine()->getManager();
        $em->persist($packOption);
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('pack_show', array('id' => $packOption->getPack()->getId())));
        }
        return $this->render('BenskiCatalogueBundle:Pack:new.html.twig', array(
            'form' => $editForm->createView(),
        ));
    }

    public function updateBindOptionChoixMultiple(Request $request, $pack, $option) {
        $packOption = $pack->getPackOption($option);
        $editForm = $this->createFormEditBindOptionChoixMultiple($packOption);

        $em = $this->getDoctrine()->getManager();
        $em->persist($packOption);
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('pack_show', array('id' => $packOption->getPack()->getId())));
        }
        return $this->render('BenskiCatalogueBundle:Pack:new.html.twig', array(
            'form' => $editForm->createView(),
        ));
    }

    /**
     * @Route("/{pack}/edit/option/{option}", name="pack_bind_option_edit")
     *
     * @Secure(roles="ROLE_ADMIN")
     * @ParamConverter("pack",      class="BenskiCatalogueBundle:Pack")
     * @ParamConverter("option",    class="BenskiCatalogueBundle:Option\AbstractOption")
     */
    public function editBindOptionAction($pack, $option) {
        $packOption = $pack->getPackOption($option);
        $form = null;
        if ($option instanceof \Benski\CatalogueBundle\Entity\Option\OptionACocher)
            $form = $this->createFormEditBindOptionACocher($packOption);
        if ($option instanceof \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple)
            $form = $this->createFormEditBindOptionChoixMultiple($packOption);

        return $this->render('BenskiCatalogueBundle:Pack:new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    protected function createFormEditBindOptionACocher($packOption) {
        $form = $this->createForm(new PackOptionACocherType(), $packOption, array(
                    'action' => $this->generateUrl('pack_bind_option_update', array(
                        'pack' => $packOption->getPack()->getId(),
                        'option' => $packOption->getOption()->getId(),
                    )),
                    'method' => 'POST',
                ))
                ->add('bind', 'submit', array('label' => 'Edit'));
        ;
        return $form;
    }

    protected function createFormEditBindOptionChoixMultiple(PackOption $packOption) {
        $form = $this->createForm(new PackOptionChoixMutlipleType(), $packOption, array(
                    'action' => $this->generateUrl('pack_bind_option_update', array(
                        'pack' => $packOption->getPack()->getId(),
                        'option' => $packOption->getOption()->getId(),
                    )),
                    'method' => 'POST',
                ))
                ->add('bind', 'submit', array('label' => 'Edit'));
        ;
        return $form;
    }

    /**
     *
     *
     * @Secure(roles="ROLE_ADMIN")
     * @return type
     */
    public function createFormSelectOption() {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

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

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @param \Benski\CatalogueBundle\Controller\OptionACocher $entity
     * @return type
     */
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

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @param \Benski\CatalogueBundle\Entity\PackOptionACocher $entity
     * @return type
     */
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

    /**
     * @Route("/{packId}/bind/option", name="pack_bind_option_form")
     * @Secure(roles="ROLE_ADMIN")
     * @param type $packId
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
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

    /**
     * @Route("/{pack}/remove/option/{option}", name="pack_bind_option_remove")
     *
     * @param Pack $pack
     * @param AbstractOption $option
     */
    public function removeOptionBindAction(Pack $pack, AbstractOption $option){
        $packOption = $pack->getPackOption($option);

        $em = $this->getDoctrine()->getManager();
        $em->remove($packOption);
        $em->flush();

        return $this->redirect($this->generateUrl(('pack_show'), array(
            'id' => $pack->getId()
        )));
    }

//    /*
//     *
//     * @ParamConverter('Pack',    class="BenskiCatalogueBundle:Pack")
//     * @ParamConverter('AbstractOption',    class="BenskiCatalogueBundle:AbstractOption")
//     *
//     */
//    public function removeBindAction(Pack $pack, AbstractOption $option) {
//        $packOption = $pack->getPackOption($option);
//
//        $em = $this->getDoctrine()->getManager();
//        $em->remove($packOption);
//        $em->flush();
//
//        return $this->redirect(generateUrl(('pack_show'), array(
//            'id' => $pack->getId()
//        )));
//    }

    /**
     * @Route("/{packId}/bind/option/{id}", name="pack_bind_option_create")
     *
     * @Secure(roles="ROLE_ADMIN")
     * @param type $packId
     * @param \Benski\CatalogueBundle\Entity\Option\AbstractOption $option
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     * @throws type
     */
    public function createBindOptionAction($packId, AbstractOption $option, Request $request) {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

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

    /*     * * CRUD ** */
    /*     * * CRUD ** */
    /*     * * CRUD ** */
    /*     * * CRUD ** */
    /*     * * CRUD ** */

    /**
     * @Route("/", name="pack")
     *
     * Lists all Pack entities.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction() {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiCatalogueBundle:Pack')->findAll();

        return $this->render('BenskiCatalogueBundle:Pack:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * @Route("/create", name="pack_create")
     * @Method("POST")
     *
     * Creates a new Pack entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request) {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

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
     * @Secure(roles="ROLE_ADMIN")
     * @param Pack $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pack $entity) {
        $form = $this->createForm(new PackType(), $entity, array(
            'action' => $this->generateUrl('pack_create'),
            'method' => 'POST',
        ));
        $form->remove('presentation');
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * @Route("/new", name="pack_new")
     *
     * Displays a form to create a new Pack entity.
     * @Secure(roles="ROLE_ADMIN")
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
     * @Route("/{id}/show", name="pack_show")
     *
     * Finds and displays a Pack entity.
     * @Secure(roles="ROLE_ADMIN")
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
     * @Route("edit/{id}", name="pack_edit")
     *
     * Displays a form to edit an existing Pack entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction($id) {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

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
     * @Secure(roles="ROLE_ADMIN")
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
     * @Route("/{id}/update", name="pack_update")
     *
     * Edits an existing Pack entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id) {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

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
     * @Route("/{id}/delete", name="pack_delete")
     *
     * Deletes a Pack entity.
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction(Request $request, $id) {

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Accès limité aux administrateurs');
        }

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
     * @Secure(roles="ROLE_ADMIN")
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
