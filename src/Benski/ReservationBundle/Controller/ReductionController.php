<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Benski\ReservationBundle\Entity\Reduction;
use Benski\ReservationBundle\Form\ReductionType;

/**
 * Reduction controller.
 *
 * @Route("/reduction")
 */
class ReductionController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'reduction_new',
        self::$ROUTE_INDEX_INDEX => 'reduction',
        self::$ROUTE_INDEX_DELETE => 'reduction_show',
        self::$ROUTE_INDEX_EDIT => 'reduction_edit',
        self::$ROUTE_INDEX_SHOW => 'reduction_show',
    ));

    $this->setLayoutPath('BenskiReservationBundle:Reduction:layout.html.twig');
    $this->setIndexPath("BenskiReservationBundle:Reduction:index.html.twig");
    $this->setShowPath("BenskiReservationBundle:Reduction:show.html.twig");
    $this->setEditPath("BenskiReservationBundle:Reduction:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new Reduction();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('BenskiReservationBundle:Reduction');
    }

    /**
     * Lists all Reduction entities.
     *
     * @Route("/", name="reduction")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Reduction entity.
     *
     * @Route("/", name="reduction_create")
     * @Method("POST")
     * @Template("BenskiReservationBundle:Reduction:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Reduction entity.
    *
    * @param Reduction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(Reduction $entity)
    {
        $form = $this->createForm(new ReductionType(), $entity, array(
            'action' => $this->generateUrl('reduction_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reduction entity.
     *
     * @Route("/new", name="reduction_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Reduction entity.
     *
     * @Route("/{id}", name="reduction_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Reduction entity.
     *
     * @Route("/{id}/edit", name="reduction_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Reduction entity.
    *
    * @param Reduction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(Reduction $entity)
    {
        $form = $this->createForm(new ReductionType(), $entity, array(
            'action' => $this->generateUrl('reduction_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reduction entity.
     *
     * @Route("/{id}", name="reduction_update")
     * @Method("PUT")
     * @Template("BenskiReservationBundle:Reduction:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Reduction entity.
     *
     * @Route("/{id}", name="reduction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Reduction entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reduction_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
