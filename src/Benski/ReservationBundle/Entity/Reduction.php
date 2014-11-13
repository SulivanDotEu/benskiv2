<?php

namespace Benski\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reduction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\ReductionRepository")
 */
class Reduction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Benski\ReservationBundle\Entity\ReservationImpl", inversedBy="reductions")
     */
    private $reservation;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    function __toString()
    {
        return "Reduction #".$this->getId();
        // TODO: Implement __toString() method.
    }


    /**
     * Set montant
     *
     * @param integer $montant
     * @return Reduction
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    
        return $this;
    }

    /**
     * Get montant
     *
     * @return integer 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Reduction
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reservation
     *
     * @param \Benski\ReservationBundle\Entity\ReservationImpl $reservation
     * @return Reduction
     */
    public function setReservation(\Benski\ReservationBundle\Entity\ReservationImpl $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Benski\ReservationBundle\Entity\ReservationImpl 
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}
