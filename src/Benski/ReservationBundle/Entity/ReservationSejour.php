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
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function prePersist() {
        $this->total = $this->sejourReserve->getTotal();
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
