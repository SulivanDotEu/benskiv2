<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Benski\ContentBundle\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benski\ContentBundle\Entity\Link;

/**
 * Description of ButtonBuilder
 *
 * @author Benjamin
 */
class ButtonBuilder {

    //put your code here
    /**
     *
     * @var Controller
     */
    private $controller;

    function __construct($controller) {
        $this->controller = $controller;
    }

    public function buildButtonForArticleRef($link) {
        $list = $this->getHtmlList($link);
        $icon = '<span class="glyphicon glyphicon-info-sign" style="color: #428bca; "></span>';
        $dropdown = '<span class="dropdown" >
                    <span class="dropdown-toggle" data-toggle="dropdown">
        %s
        </span>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation" class="dropdown-header">Contenu(s) associé(s)</li>
        %s
        </ul>
        </span>';
        $html = sprintf($dropdown, $icon, $list);
        return $html;
    }
    
    public function getHtmlList($link){
        $array = $this->generateArrayWithURL($link);
        $html = '';
        foreach ($array as $title => $url) {
            $html .= '<li><a href="'.$url.'">'.$title.'</a></li>';
        }
        return $html;
    }
    
    private function generateArrayWithURL($link){
        $array = array();
        foreach ($link->getArticles() as $article) {
            /* @var $link \Benski\ContentBundle\Entity\Link */
            $title = $article->getTitre();
            $articleId = $article->getId();
            $url = $this->controller->generateUrl('public_article_show', array(
                'id' => $articleId
            ));
            $array[$title] = $url;
        }
        return $array;
    }

}
