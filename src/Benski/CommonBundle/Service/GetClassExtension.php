<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 14/09/14
 * Time: 14:05
 */

namespace Benski\CommonBundle\Service;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;

/**
 * Class GetClassExtension
 * @package Benski\CommonBundle\Service
 * @Service("walva.twig.extension.get_class")
 * @Tag("twig.extension")
 */
class GetClassExtension extends \Twig_Extension{

    public function getFilters(){
        return array(new \Twig_SimpleFilter('get_class', array($this, 'getClassFilter')));
    }

    public function getClassFilter($object){
        return get_class($object);
    }

    public function getName(){
        return "get_class";
    }

} 