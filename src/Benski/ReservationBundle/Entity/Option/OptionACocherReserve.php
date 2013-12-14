<?php

namespace Benski\ReservationBundle\Entity\Option;

use Doctrine\ORM\Mapping as ORM;

/**
 * OptionACocherReserve
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\Option\OptionACocherReserveRepository")
 */
class OptionACocherReserve extends OptionReserve
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="coche", type="boolean")
     */
    protected $coche;
    
    public function getIntitule(){
        return $this->getOption()->getIntitule();
    }
    
    public function isSelected(){
        return $this->getCoche();
    }
            
    public function getPrixCatalogue(){
        $pack = $this->getPackReserve();
        $packOption = $pack->getPackOption($this->getOption());
        $prix = $packOption->getPrix();
        return $prix;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return parent::getId();
    }

    /**
     * Set coche
     *
     * @param boolean $coche
     * @return OptionACocherReserve
     */
    public function setCoche($coche)
    {
        $this->coche = $coche;
        if($coche == false){
            $this->setPrix(0);
        } else {
            $this->setPrix($this->getPrixCatalogue());
        }
    
        return $this;
    }

    /**
     * Get coche
     *
     * @return boolean 
     */
    public function getCoche()
    {
        return $this->coche;
    }
}
