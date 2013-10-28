<?php

namespace Benski\CommonBundle\Object;

class MenuFactory extends \Twig_Extension {

    private $menu = array();
    
    public function addElt(MenuElt $newElt) {
        if(!isset(self::$menu[$newElt->id])) { 
            self::$menu[$newElt->id] = $newElt;
        }
    }
    
    public function creerElt($id, $bootstrap_label, $txt, $link){
        $this->addElt(new MenuElt($id, $bootstrap_label, $txt, $link));
    }

    public function getMenu(){
        return $this->menu;
    }

    public function getName() {
        return 'MenuFactory';
    }
    
    public function getFunctions() {    
        return array(
      'MenuFactory' => new \Twig_Function_Method($this, 'getMenu')
    );
        
    }
}


class MenuElt {
    
    public $id;
    public $bootstrap_label;
    public $txt;
    public $link;
    
    public function __construct($id, $bootstrap_label, $txt, $link) {
        $this->id = $id;
        $this->bootstrap_label = $bootstrap_label;
        $this->txt = $txt;
        $this->link;
    }
    
    
}

?>
