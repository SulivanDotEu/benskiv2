<?php

namespace Benski\ContentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Benski\ContentBundle\Entity\Link;
use Benski\ContentBundle\Form\LinkType;
new \Symfony\Component\HttpFoundation\Response;

/**
 * Link controller.
 *
 * @Route("/link")
 */
class LinkController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenskiContentBundle:Link')->findAll();

        return $this->render('BenskiContentBundle:Link:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    public function unbindAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:Link')->find($id);
        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('link'));
    }

    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:Link')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('BenskiContentBundle:Link:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
        ));
    }

    private function createEditForm(Link $entity) {
        $form = $this->createForm(new LinkType(), $entity, array(
            'action' => $this->generateUrl('link_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:Link')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('link_edit', array('id' => $id)));
        }

        return $this->render('BenskiContentBundle:Link:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
        ));
    }

    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenskiContentBundle:Link')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        return $this->render('BenskiContentBundle:Link:show.html.twig', array(
                    'entity' => $entity,
        ));
    }

    // GETS
    
    public function displayBindButtonAction($object){
        $class = get_class($object);
        $class = str_replace('\\', '-', $class);
        $html = '<a class="btn" href="'.$this->generateUrl('link_bind', 
                array(
                    'class' => $class,
                    'id'    => $object->getId()
                ));
        $html .='"><i class="icon-magnet"></i> Bind content</a>';
        return new \Symfony\Component\HttpFoundation\Response($html);
    }
    
    public function displayButtonAction($object){
        $buttonBuilder = new \Benski\ContentBundle\View\ButtonBuilder($this);
        $link = $this->getLinkFromObject($object);
        if($link == null){
            return new \Symfony\Component\HttpFoundation\Response('');
        }
        $button = $buttonBuilder->buildButtonForArticleRef($link);
        return new \Symfony\Component\HttpFoundation\Response($button);
    }
    
    public function getLinkFromObject($object){
        $class = get_class($object);
        $class = str_replace('Proxies\\__CG__\\', '', $class);
        $class = str_replace('\\', '-', $class);
        
        return $this->getLink($class, $object->getId());
    }
    
    private function getLink($class, $ownerId){
        $em = $this->getDoctrine()->getManager();

        $entity = $em
                ->getRepository('BenskiContentBundle:Link')
                ->findByClassAndId($class, $ownerId);
        if($entity != null) return $entity[0];
        return $entity;
    }

    private function getContentsFormLinks($entities) {
        $contents = array();
        foreach ($entities as $entity) {
            /* @var $entity Link */
            $contents[] = $entity->getArticle();
        }
        return $contents;
    }

    public function getContents($class, $ownerId) {
        $entity = $this->getLink($class, $ownerId);
        

        return array(
            'entities' => $this->getContentsFormLinks($entities),
        );
    }

    public function createButtonAction($class, $ownerId) {
        $content = $this->getContents($class, $ownerId);
        // je crée le boutton dropdown avec le lien vers les contenus
    }

    public function bindAction(Request $request, $id, $class) {
        $entity = $this->getLink($class, $id);
        
        if($entity != null){
            return $this->redirect($this->generateUrl('link_edit', array(
                'id' => $entity->getId()
            )));
        }
        //$class2 = str_replace('-', '\\', $class);
        $entity = new Link();
        $entity->setClassName($class);
        $entity->setOwnerId($id);
        $form = $this->createCreateForm($entity, $id, $class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('article'));
        }

        return $this->render('BenskiContentBundle:Link:bind.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    private function createCreateForm(Link $entity, $id, $class) {
        $form = $this->createForm(new LinkType(), $entity, array(
            'action' => $this->generateUrl('link_bind', array('id' => $id, 'class' => $class)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Bind'));

        return $form;
    }

}
