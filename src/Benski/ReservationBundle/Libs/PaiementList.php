<?php

namespace Benski\ReservationBundle\Libs;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaiementList
 *
 * @author Benjamin Ellis
 */
class PaiementList {
    //put your code here
    protected $list;
    
    function __construct($list) {
        $this->list = $list;
    }
    
    public function getPaiementsEnAttente(){
        
    }

}
