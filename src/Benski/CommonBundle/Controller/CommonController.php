<?php

namespace Benski\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class CommonController extends Controller {
    
    /**
     * @return type
     */
    public function indexAction() {
        return $this->render('BenskiCommonBundle:Default:index.html.twig');
    }
    
}

?>
