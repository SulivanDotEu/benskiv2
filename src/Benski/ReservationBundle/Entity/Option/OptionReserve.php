<?php

namespace Benski\ReservationBundle\Entity\Option;

use Doctrine\ORM\Mapping as ORM;
use Benski\ReservationBundle\Entity\PackReserve;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;


/**
 * OptionReserve
 *
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\Option\OptionReserveRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 */
class OptionReserve {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\Participant",
     *      inversedBy="optionsReserves")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $participant;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\AppartementReserve",
     *      inversedBy="optionsReserves")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $appartement;

    /**
     * @ var Benski\ReservationBundle\Entity\PackReserve
     * 
     * @ORM\ManyToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\PackReserve",
     *      inversedBy="optionsReserves")
     */
    protected $packReserve;
    
    /**
     * @var Benski\CatalogueBundle\Entity\AbstractOption
     * @ORM\ManyToOne(
     *      targetEntity="Benski\CatalogueBundle\Entity\Option\AbstractOption")
     */
    protected $option;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    protected $prix;
   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return OptionReserve
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix() {
        return $this->prix;
    }


    /**
     * Set packReserve
     *
     * @param \Benski\ReservationBundle\Entity\PackReserve $packReserve
     * @return OptionReserve
     */
    public function setPackReserve(PackReserve $packReserve = null)
    {
        $this->packReserve = $packReserve;
    
        return $this;
    }

    /**
     * Get packReserve
     *
     * @return \Benski\ReservationBundle\Entity\PackReserve 
     */
    public function getPackReserve()
    {
        return $this->packReserve;
    }

    /**
     * Set option
     *
     * @param \Benski\CatalogueBundle\Entity\AbstractOption $option
     * @return OptionReserve
     */
    public function setOption( $option = null)
    {
        $this->option = $option;
    
        return $this;
    }

    /**
     * Get option
     *
     * @return \Benski\CatalogueBundle\Entity\AbstractOption 
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set participant
     *
     * @param \Benski\ReservationBundle\Entity\Participant $participant
     * @return OptionReserve
     */
    public function setParticipant(\Benski\ReservationBundle\Entity\Participant $participant = null)
    {
        if($participant->equals($this->getParticipant())) return;
        $this->participant = $participant;
        $this->getParticipant()->addOptionsReserve($this);
    
        return $this;
    }

    /**
     * Get participant
     *
     * @return \Benski\ReservationBundle\Entity\Participant 
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set appartement
     *
     * @param \Benski\ReservationBundle\Entity\AppartementReserve $appartement
     * @return OptionReserve
     */
    public function setAppartement(\Benski\ReservationBundle\Entity\AppartementReserve $appartement = null)
    {
        if($appartement->equals($this->getAppartement())) return;
        $this->appartement = $appartement;
        $appartement->addOptionsReserve($this);
    
        return $this;
    }

    /**
     * Get appartement
     *
     * @return \Benski\ReservationBundle\Entity\AppartementReserve 
     */
    public function getAppartement()
    {
        return $this->appartement;
    }
}