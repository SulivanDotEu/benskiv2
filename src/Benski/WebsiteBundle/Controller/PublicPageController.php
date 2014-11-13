<?php

namespace Benski\WebsiteBundle\Controller;

use Benski\WebsiteBundle\Entity\Page;
use JMS\DiExtraBundle\Annotation\Inject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * @Route("/{_locale}/{url}", name="benski_page", defaults={"_locale":"fr"}, requirements={"_locale" = "en|de|fr|es|nl"})
     */
    public function pageAction($url)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("BenskiWebsiteBundle:Page");
        $result = $repository->findByUrl($url);
        if($result == null OR empty($result)){
            if($this->get('security.context')->isGranted('ROLE_ADMIN')){
                return $this->processPageNotFoundForAdmin($url);
            }
        }
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

    private function processPageNotFoundForAdmin($url){
        $urlForFix = $this->generateUrl('page');
        $message = "Il n'y a pas de page avec l'url ".$url.". ";
        $message.= "Va voir <a href=\"%s\"> dans l'administration des pages</a>";
        $message = sprintf($message, $urlForFix);
        return new Response($message);
    }

    /**
     * @Route("admin/website/config/creation-required-for-{internalName}", name="bepark_website_config_required")
     * @param $internalName
     * @return Response
     */
    public function pleaseCreatePageAction($internalName){
        $urlForFix = $this->generateUrl('page');
        $message = "Il faut créer une page avec internal name = \"" .$internalName."\" ".
            "<a href=\"%s\"> dans l'administration des pages</a>";
        $message = sprintf($message, $urlForFix);
        return new Response($message);
    }

    /**
     * @param $internalName
     */
    public function getHrefAction($internalName){
        $repository = $this->getDoctrine()->getManager()->getRepository("BenskiWebsiteBundle:Page");
        $result = $repository->findByInternalName($internalName);
        if(empty($result)){
            if($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                return new Response($this->generateUrl("bepark_website_config_required", array(
                    'internalName' => $internalName
                )));
            }
            return new Response('#');
        }
        $entity = $result[0];
        /** @var Page $entity */
        $entity->getInternalName();
        return new Response($this->generateUrl("benski_page", array('url' => $entity->getUrl())));
    }
}
