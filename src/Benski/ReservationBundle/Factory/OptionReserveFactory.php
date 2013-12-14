<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Benski\ReservationBundle\Factory;

use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;
use Benski\CatalogueBundle\Entity\Option\OptionACocher;
use Benski\ReservationBundle\Entity\Option\OptionReserve;
use Benski\ReservationBundle\Entity\Option\OptionACocherReserve;
use Benski\ReservationBundle\Entity\Option\OptionChoixMultipleReserve;

/**
 * Description of OptionReserveFactory
 *
 * @author Benjamin
 */
class OptionReserveFactory {

    //put your code here
    private function createOptionReserve($option) {
        $optionReserve;
        if ($option instanceof OptionChoixMultiple) {
            $optionReserve = new Option\OptionChoixMultipleReserve;
        } else if ($option instanceof OptionACocher) {
            $optionReserve = new Option\OptionACocherReserve();
        }
        $optionReserve->setPackReserve($this);
        $optionReserve->setOption($option);
        return $optionReserve;
    }

}
