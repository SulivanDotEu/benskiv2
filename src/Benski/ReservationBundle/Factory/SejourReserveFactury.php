<?php

namespace Benski\ReservationBundle\Factory;

use Benski\CatalogueBundle\Entity\Destination;
use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Entity\Appartement;
use Benski\CatalogueBundle\Entity\Pack;

/**
 * Description of SejourReserveFactury
 *
 * @author Benjamin
 */
class SejourReserveFactury {

//put your code here

    public static function makeSejourReserve(
    Sejour $sejour, Destination $destination, Appartement $appartement, Pack $pack, $nbrPersonnes) {
        $sejourReserve = new SejourReserve();
        $sejourReserve->setSejour($sejour);
        $sejourReserve->setDestination($destination);
        $appartementReserve = new AppartementReserve();
        $appartementReserve->setAppartement($appartement);
        $appartementReserve->setNombrePersonnes($nbrPersonnes);
        $packReserve = new PackReserve();
        $packReserve->setPack($pack);
        $appartementReserve->setPackReserve($packReserve);
        $sejourReserve->addAppartementsReserve($appartementReserve);
        
        
    }

}
