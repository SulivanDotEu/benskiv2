<?php

namespace Benski\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\ReservationBundle\Entity\SejourReserve;
use Benski\ReservationBundle\Entity\ReservationImpl;

/**
 * ReservationSejour
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\ReservationSejourRepository")
 * @ORM\HasLifecycleCallbacks
 */
class ReservationSejour extends ReservationImpl {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var SejourReserve
     *
     * @ORM\OneToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\SejourReserve",
     *      inversedBy="reservation",
     *      cascade={"all", "remove"},
     *      orphanRemoval=true,
     *      fetch="EAGER"
     *  )
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $sejourReserve;
    
    public function getNombresPersonnes(){
        return $this->getSejourReserve()->getNombresPersonnes();
    }

    public function confirmer(){
        $this->calculateTotal();
        $total = $this->getTotal();
        $dateSejour = $this->getSejourReserve()->getSejour()->getDateDebut();
        $today = new \DateTime();
        $diff = $dateSejour->diff($today);
        $days = $today->diff($dateSejour)->format('%a');

        $this->paiements = array();

        if($days >= 40){
            // si + de 40 j => 2 paiement
            $paiement = new Paiement();
            $paiement->setReservation($this);
            $acompte = round($total/100*30);
            $paiement->setMontant($acompte);
            // je donne 5 jours pour exécuter le paiement.
            $today->add(new \DateInterval('P5D'));
            $paiement->setDateLimite(clone $today);
            $this->addPaiement($paiement);

            $paiement = new Paiement();
            $paiement->setReservation($this);
            $paiement->setMontant($total-$acompte);
            $dateSolde = clone $dateSejour;
            $dateSolde->sub(new \DateInterval('P30D'));
            $paiement->setDateLimite($dateSolde);
            $this->addPaiement($paiement);
        } else{
            // un seul paiement
            $paiement = new Paiement();
            $paiement->setReservation($this);
            $paiement->setMontant($total);

            // si dépard dans + de 10 jours => on laisse 3 jours
            if($days > 10){
                $today->add(new \DateInterval('P3D'));
            } elseif($days > 5){
                // si dépard dans + de 10 jours => on laisse 2 jours
                $today->add(new \DateInterval('P2D'));
            } else{
                // si dépard dans + de 10 jours => on laisse 1 jours
                $today->add(new \DateInterval('P1D'));
            }
            $paiement->setDateLimite($today);
            $this->addPaiement($paiement);
        }
        $paiements = $this->getPaiements();
        foreach ($paiements as $paiement) {
            /** @var $paiement Paiement */
            $paiement->setUser($this->getResponsable());
            $paiement->initCode();
        }
    }

    public function equals($object) {
        if ($object == null)
            return false;
        if (!$object instanceof ReservationSejour)
            return false;
        if ($object == $this)
            return true;
        if ($this->getId() == null)
            return false;
        if ($this->getId() != $object->getId())
            return false;
        return true;
    }


    /**
     * This method calculate the total and set it to the entity.
     * @return int the total of the reservation
     */
    public function calculateTotal() {
        $this->total = $this->sejourReserve->getTotal();
        return $this->total;
    }

    public function getDateDebut(){
        return $this->getSejourReserve()->getDateDebut();
    }
    
    public function getDateFin(){
        return $this->getSejourReserve()->getDateFin();
    }

    public function addSejourReserve(SejourReserve $sr) {
        $this->getSejourReserve()
                ->addAppartementsReserve($sr->getAppartementsReserves()[0]);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return parent::getId();
    }

    /**
     * Set sejourReserve
     *
     * @param \Benski\ReservationBundle\Entity\SejourReserve $sejourReserve
     * @return ReservationSejour
     */
    public function setSejourReserve(SejourReserve $sejourReserve = null) {
        if($sejourReserve->equals($this->getSejourReserve())) return;
        $this->sejourReserve = $sejourReserve;
        $sejourReserve->setReservation($this);

        return $this;
    }

    /**
     * Get sejourReserve
     *
     * @return \Benski\ReservationBundle\Entity\SejourReserve 
     */
    public function getSejourReserve() {
        return $this->sejourReserve;
    }

}
