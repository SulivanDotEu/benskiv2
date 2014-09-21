<?php

namespace Benski\WebsiteBundle\Controller;

use Benski\WebsiteBundle\Entity\Page;
use JMS\DiExtraBundle\Annotation\Inject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Walva\SimpleCmsBundle\Service\ContentManager;
use Walva\SimpleCmsBundle\Service\ContentRequest;

/**
 * Class PublicController
 * @package Benski\WebsiteBundle\Controller
 */
class PublicPageController extends Controller
{

    /**
     * @Inject("simplecms.manager.content")
     * @var ContentManager
     */
    public $contentManager;

    /**
     * @Route("/{url}", name="benski_page")
     */
    public function pageAction($url)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("BenskiWebsiteBundle:Page");
        $result = $repository->findByUrl($url);
        $entity = $result[0];
        /** @var Page $entity */
        $block = $entity->getBlock();
        $contentRequest = $this->contentManager->createEmptyContentRequest($block->getInternalName());
        $content = $block->getContentForRequest($contentRequest);

        return $this->render("@BenskiWebsite/Public/page.html.twig", array(
            'entity' => $entity,
            'content' => $content,
        ));
    }

    /**
     * @param $internalName
     */
    public function getHrefAction($internalName){
        $repository = $this->getDoctrine()->getManager()->getRepository("BenskiWebsiteBundle:Page");
        $result = $repository->findByInternalName($internalName);
        $entity = $result[0];
        /** @var Page $entity */
        $entity->getInternalName();
        return new Response($this->generateUrl("benski_page", array('url' => $entity->getUrl())));
    }
}
