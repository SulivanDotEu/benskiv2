<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Benski\CommonBundle\Twig;

use \Twig_Extension;

/**
 * Description of BadgeBootstrapExtension
 *
 * @author Benjamin
 */
class LabelBootstrapExtension extends Twig_Extension {
    
    public static $COULEUR_BLEU = 1;
    public static $COULEUR_GRIS = 2;
    public static $COULEUR_NOIR = 3;
    public static $COULEUR_ORANGE = 4;
    public static $COULEUR_ROUGE = 5;
    public static $COULEUR_VERT = 6;

    //put your code here

    public function getFilters() {
        return array(
            'walva_label' => new \Twig_Filter_Method($this, 'getLabel'),
        );
    }
/*
 * {{ entity.lieu | label(2) | raw }}
 */
    public function getLabel($content, $color = 0, $boostrap_version = 2) {
        if ($color == 0){
            $color = Formation::$COULEUR_BLEU;
        }
        
        $string = '<span class="%s">%s</span>';
        $class;
        
        switch ($color) {
            case self::$COULEUR_BLEU:
                $class = "label label-info";
                break;
            case self::$COULEUR_GRIS:
                $class = "label";
                break;
            case self::$COULEUR_NOIR:
                $class = "label label-inverse";
                break;
            case self::$COULEUR_ORANGE:
                $class = "label label-warning";
                break;
            case self::$COULEUR_ROUGE:
                $class = "label label-important";
                break;
            case self::$COULEUR_VERT:
                $class = "label label-success";
                break;

            default:
                break;
        }
        
        $string = sprintf($string, $class, $content);
        
        return $string;
    }

    public function getName() {
        return 'walva_label_bootstrap';
    }

}

?>
