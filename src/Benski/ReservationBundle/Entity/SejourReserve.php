<?php

namespace Benski\ReservationBundle\Entity;

use Benski\CatalogueBundle\Entity\Sejour;
use Doctrine\ORM\Mapping as ORM;

/**
 * SejourReserve
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\SejourReserveRepository")
 * @ORM\HasLifecycleCallbacks
 */
class SejourReserve {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Benski\ReservationBundle\Entity\ReservationSejour
     *
     * @ORM\OneToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\ReservationSejour",
     *      mappedBy="sejourReserve",
     *      cascade={"all", "remove"}
     *      )
     */
    protected $reservation;

    /**
     * @var Benski\CatalogueBundle\Entity\Sejour
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\CatalogueBundle\Entity\Sejour"
     * )
     * @ORM\JoinColumn(
     *      nullable=false
     * )
     * 
     */
    protected $sejour;

    /**
     * @var Benski\CatalogueBundle\Entity\Destination
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\CatalogueBundle\Entity\Destination"
     * )
     * @ORM\JoinColumn(
     *      nullable=false
     * )
     */
    protected $destination;


    /**
     * @var \stdClass
     *
     * @ORM\Column(name="optionsReserves", type="object")
     */
    //private $optionsReserves;

    /**
     * @var Benski\ReservationBundle\Entity\AppartementReserve
     *
     * @ORM\OneToMany(
     *      targetEntity="Benski\ReservationBundle\Entity\AppartementReserve",
     *      mappedBy="sejourReserve",
     *      orphanRemoval=true,
     *      cascade="ALL"
     * )
     */
    protected $appartementsReserves;
    
    public function equals($object) {
        if ($object == null)
            return false;
        if (!$object instanceof SejourReserve)
            return false;
        if ($object == $this)
            return true;
        if ($this->getId() == null)
            return false;
        if ($this->getId() != $object->getId())
            return false;
        return true;
    }

    
    public function __toString() {
        return 'sejourReserve #'.$this->getId();
    }
    
    public function getNombreAppartement(){
        return count($this->getAppartementsReserves());
    }

    public function getNombresPersonnes() {
        $total = 0;
        foreach ($this->appartementsReserves as $appartementReserve) {
            /* @var $appartementReserve AppartementReserve */
            $total += $appartementReserve->getNombrePersonnes();
        }
        return $total;
    }

    public function getDateDebut() {
        return $this->getSejour()->getDateDebut();
    }

    public function getDateFin() {
        return $this->getSejour()->getDateFin();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->appartementsReserves = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->appartementsReserves as $ar) {
            $total += $ar->getTotal();
        }
        return $total;
    }

    public function getAppartementReserveByNumero($num) {
        foreach ($this->appartementsReserves as $ar) {
            if ($ar->getNumero() == $num)
                return $ar;
        }
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set reservation
     *
     * @param \Benski\ReservationBundle\ReservationSejour $reservation
     * @return SejourReserve
     */
    public function setReservation(\Benski\ReservationBundle\Entity\ReservationSejour $reservation = null) {
        if($reservation->equals($this->getReservation())) return;
        $this->reservation = $reservation;
        $reservation->setSejourReserve($this);

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Benski\ReservationBundle\ReservationSejour 
     */
    public function getReservation() {
        return $this->reservation;
    }

    /**
     * Set sejour
     *
     * @param \Benski\CatalogueBundle\Sejour $sejour
     * @return SejourReserve
     */
    public function setSejour(\Benski\CatalogueBundle\Entity\Sejour $sejour) {
        $this->sejour = $sejour;

        return $this;
    }

    /**
     * Get sejour
     *
     * @return Sejour
     */
    public function getSejour() {
        return $this->sejour;
    }

    /**
     * Set destination
     *
     * @param \Benski\CatalogueBundle\Destination $destination
     * @return SejourReserve
     */
    public function setDestination(\Benski\CatalogueBundle\Entity\Destination $destination) {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \Benski\CatalogueBundle\Destination 
     */
    public function getDestination() {
        return $this->destination;
    }

    /**
     * Add appartementsReserves
     *
     * @param \Benski\ReservationBundle\Entity\AppartementReserve $appartementsReserves
     * @return SejourReserve
     */
    public function addAppartementsReserve(\Benski\ReservationBundle\Entity\AppartementReserve $appartementsReserves) {
        $list = $this->appartementsReserves;
        /* @var $list \Doctrine\Common\Collections\ArrayCollection */
        if ($list->contains($appartementsReserves))
            return;
        $this->appartementsReserves[] = $appartementsReserves;
        $appartementsReserves->setSejourReserve($this);
        $appartementsReserves->setNumero($this->getHigherNumberOfAppartementReserve() + 1);
        // on va attribuer un numero à l'appartement
        // pour cela, on va parcourir les appartements et prendre
        // le numero le plus élever

        return $this;
    }

    private function getHigherNumberOfAppartementReserve() {
        $max = 0;
        $list = $this->getAppartementsReserves();
        foreach ($list as $elt) {
            /* @var $elt AppartementReserve */
            $current = $elt->getNumero();
            if ($current > $max)
                $max = $current;
        }
        return $max;
    }

    /**
     * Remove appartementsReserves
     *
     * @param \Benski\ReservationBundle\Entity\AppartementReserve $appartementsReserves
     */
    public function removeAppartementsReserve(\Benski\ReservationBundle\Entity\AppartementReserve $appartementsReserves) {
        $this->appartementsReserves->removeElement($appartementsReserves);
    }

    /**
     * Get appartementsReserves
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppartementsReserves() {
        return $this->appartementsReserves;
    }

}
