<?php

namespace Benski\ReservationBundle\Entity;

use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;
use Benski\CatalogueBundle\Entity\Option\OptionACocher;
use Doctrine\ORM\Mapping as ORM;

/**
 * PackReserve
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\PackReserveRepository")
 */
class PackReserve {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Benski\CatalogueBundle\Entity\Pack
     * @ORM\ManyToOne(
     *      targetEntity="Benski\CatalogueBundle\Entity\Pack")
     */
    protected $pack;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Benski\ReservationBundle\Entity\Option\OptionReserve",
     *      mappedBy="packReserve"
     *      )
     */
    protected $optionsReserves;

    /**
     * @var AppartementReserve
     *
     * @ORM\OneToOne(targetEntity="\Benski\ReservationBundle\Entity\AppartementReserve",
     *      mappedBy="packReserve")
     */
    protected $appartementReserve;

  
    
    /**
     * @var array
     *
     * @ORM\Column(type="integer")
     */
    protected $prix;

    
    public function equals($object) {
        if ($object == null)
            return false;
        if (!$object instanceof PackReserve)
            return false;
        if ($object == $this)
            return true;
        if ($this->getId() == null)
            return false;
        if ($this->getId() != $object->getId())
            return false;
        return true;
    }
    
    public function getTotal(){
        return $this->getPrix()*$this->getAppartementReserve()->getNombrePersonnes();
    }
    
    
    
    public function getPackOption($option){
        $list = $this->getPack()->getPackOptions();
        foreach ($list as $packOption) {
            /* @var $packOption \Benski\CatalogueBundle\Entity\PackOption */
            if($packOption->getOption()->equals($option)){
                return $packOption;
            }
        }
    }

    private function initPack() {
        $pack = $this->getPack();
        /* @var $pack \Benski\CatalogueBundle\Entity\Pack */
        $options = $pack->getOptions();
        /*
        foreach ($options as $option) {
            $optionReserve = $this->createOptionReserve($option);
            $optionReserve->setPackReserve($this);
            var_dump($optionReserve);
        }
         *
         */
    }

    public function getOptionsReservesTypeIndividuelle(){
        return $this->getOptionsReservesByType(AbstractOption::$TYPE_INDIVIDUEL);
    }
    
    public function getOptionsReservesTypeGroupe(){
        return $this->getOptionsReservesByType(AbstractOption::$TYPE_GROUPE);
    }
    
    public function getOptionByType($type) {
        return $this->getPack()->getOptionByType($type);
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
     * Set pack
     *
     * @param \stdClass $pack
     * @return PackReserve
     */
    public function setPack($pack) {
        $this->pack = $pack;
        $this->initPack();
        $this->setPrix($pack->getPrix());
        return $this;
    }

    /**
     * Get pack
     *
     * @return \Benski\CatalogueBundle\Entity\Pack 
     */
    public function getPack() {
        return $this->pack;
    }

    /**
     * Set appartementReserve
     *
     * @param AppartementReserve $appartementReserve
     * @return PackReserve
     */
    public function setAppartementReserve($appartementReserve) {
        if($appartementReserve->equals($this->getAppartementReserve())) return;
        $this->appartementReserve = $appartementReserve;
        $appartementReserve->setPackReserve($this);
        

        return $this;
    }

    /**
     * Get appartementReserve
     *
     * @return AppartementReserve 
     */
    public function getAppartementReserve() {
        return $this->appartementReserve;
    }


    /**
     * Constructor
     */
    public function __construct() {
        $this->optionsReserves = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add optionsReserves
     *
     * @param \Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves
     * @return PackReserve
     */
    public function addOptionsReserve($optionsReserves) {
        $this->optionsReserves[] = $optionsReserves;

        return $this;
    }

    /**
     * Remove optionsReserves
     *
     * @param \Benski\ReservationBundle\Entity\PackReserve $optionsReserves
     */
    public function removeOptionsReserve(\Benski\ReservationBundle\Entity\PackReserve $optionsReserves) {
        $this->optionsReserves->removeElement($optionsReserves);
    }

    /**
     * Get optionsReserves
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptionsReserves() {
        return $this->optionsReserves;
    }


    /**
     * Set prix
     *
     * @param integer $prix
     * @return PackReserve
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }
}