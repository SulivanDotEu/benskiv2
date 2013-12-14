<?php

namespace Benski\ReservationBundle\Entity;

use Benski\ReservationBundle\Entity\ReservationInterface;
use Benski\ReservationBundle\Entity\ReservationSejour;
use Benski\ReservationBundle\Entity\SejourReserve;
use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Entity\Destination;

/**
 * Description of Panier
 *
 * @author Benjamin
 */
class Panier {

    protected $reservationList;

    function __construct() {
        $this->reservationList = array();
    }
    
    public function getReservations(){
        return $this->reservationList;
    }
    
    public function getReservationsSejours(){
        $list = array();
        foreach ($this->reservationList as $reservation) {
            if($reservation instanceof ReservationSejour){
                $list[] = $reservation;
            }
        }
        return $list;
    }
    
    public function removeReservationSejour(ReservationSejour $reservationSejour){
        $key = array_search($reservationSejour, $this->reservationList);
        unset($this->reservationList[$key]);
    }
    
    

    private function addReservation($r) {
        if (!$r instanceof ReservationInterface) {
            throw new \Exception('probleme lors de l\'ajout d\'une réservation');
        }
        if ($r instanceof ReservationSejour) {
            $this->reservationList[] = $r;
//$this->processAddReservationSejour($r);
        }
    }

    /**
     * S'il existe une ReservationSejour ayant la meme date (sejour)
     * et la meme destination, il faut juste lui ajouter un appartement
     * avec le pack associé.
     * Sinon il s'agit d'une nouvelle réservation à mettre dans le panier.
     * 
     * @param \Benski\ReservationBundle\Entity\ReservationSejour $rs
     */
    public function addSejourReserve(SejourReserve $sr) {
        $reservationSejour = $this->getReservationSejour($sr->getSejour(), $sr->getDestination());
        if ($reservationSejour != null) {
            /* s'il existe deja une reservation type "sejour" avec
             * la meme date et la meme destination, alors on 
             * ajoute l'appartement et le pack à la réservation
             */
            $reservationSejour->addSejourReserve($sr);
            return;
        }
        $reservationSejour = new ReservationSejour();
        $reservationSejour->setSejourReserve($sr);
        $this->addReservation($reservationSejour);
        return $reservationSejour;
    }

    public function getReservationSejour(Sejour $sejour, Destination $destination) {
        foreach ($this->reservationList as $elt) {
            if ($elt instanceof ReservationSejour) {
                /* @elt $elt Benski\ReservationBundle\Entity\ReservationSejour */
                $destination2c = $elt->getSejourReserve()->getDestination();
                $sejour2c = $elt->getSejourReserve()->getSejour();
                if ($destination->equals($destination2c) &&
                        $sejour->equals($sejour2c)) {
                    return $elt;
                }
            }
        }
        return null;
    }

    
    private function processAddReservationSejour(ReservationSejour $rs) {
        $destination = $rs->getSejourReserve()->getDestination();
        $sejour = $rs->getSejourReserve()->getSejour();

        foreach ($this->reservationList as $elt) {
            if ($elt instanceof ReservationSejour) {
                /* @var $elt Benski\ReservationBundle\Entity\ReservationSejour */
                $destination2c = $elt->getSejourReserve()->getDestination();
                $sejour2c = $elt->getSejourReserve()->getSejour();
            }
        }

        $this->reservationList[] = $rs;
    }

}
