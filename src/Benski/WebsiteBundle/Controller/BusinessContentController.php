<?php

namespace Benski\WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Benski\WebsiteBundle\Entity\BusinessContent;
use Benski\WebsiteBundle\Form\BusinessContentType;

/**
 * BusinessContent controller.
 *
 * @Route("/website/catalogue")
 */
class BusinessContentController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'website_catalogue_new',
        self::$ROUTE_INDEX_INDEX => 'website_catalogue',
        self::$ROUTE_INDEX_DELETE => 'website_catalogue_show',
        self::$ROUTE_INDEX_EDIT => 'website_catalogue_edit',
        self::$ROUTE_INDEX_SHOW => 'website_catalogue_show',
    ));

    $this->setLayoutPath('BenskiWebsiteBundle:BusinessContent:layout.html.twig');
    $this->setIndexPath("BenskiWebsiteBundle:BusinessContent:index.html.twig");
    $this->setShowPath("BenskiWebsiteBundle:BusinessContent:show.html.twig");
    $this->setEditPath("BenskiWebsiteBundle:BusinessContent:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new BusinessContent();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('BenskiWebsiteBundle:BusinessContent');
    }

    /**
     * Lists all BusinessContent entities.
     *
     * @Route("/", name="website_catalogue")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new BusinessContent entity.
     *
     * @Route("/", name="website_catalogue_create")
     * @Method("POST")
     * @Template("BenskiWebsiteBundle:BusinessContent:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a BusinessContent entity.
    *
    * @param BusinessContent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(BusinessContent $entity)
    {
        $form = $this->createForm(new BusinessContentType(), $entity, array(
            'action' => $this->generateUrl('website_catalogue_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BusinessContent entity.
     *
     * @Route("/new", name="website_catalogue_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a BusinessContent entity.
     *
     * @Route("/{id}", name="website_catalogue_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing BusinessContent entity.
     *
     * @Route("/{id}/edit", name="website_catalogue_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a BusinessContent entity.
    *
    * @param BusinessContent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(BusinessContent $entity)
    {
        $form = $this->createForm(new BusinessContentType(), $entity, array(
            'action' => $this->generateUrl('website_catalogue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BusinessContent entity.
     *
     * @Route("/{id}", name="website_catalogue_update")
     * @Method("PUT")
     * @Template("BenskiWebsiteBundle:BusinessContent:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a BusinessContent entity.
     *
     * @Route("/{id}", name="website_catalogue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a BusinessContent entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('website_catalogue_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
