<?php

namespace Benski\ReservationBundle\Entity\Option;

use Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple;
use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;
use Benski\CatalogueBundle\Entity\PackOptionChoixMultiple;
use Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple;
use Doctrine\ORM\Mapping as ORM;

/**
 * OptionChoixMultipleReserve
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\Option\OptionChoixMultipleReserveRepository")
 */
class OptionChoixMultipleReserve extends OptionReserve {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple"
     * )
     */
    protected $choix;

    public function isSelected(){
        return true;
    }
    
    public function getIntitule(){
        return $this->getChoix()->getIntitule();
    }
    
    public function getPrixCatalogue() {
        $pack = $this->getPackReserve();
        $packOption = $pack->getPackOption($this->getOption());
        $listPrixOption = $packOption->getPrixOption();
        $array = array();
        foreach ($listPrixOption as $prixOption) {
            $prix = $prixOption->getPrix();
            $choix = $prixOption->getChoix();
            $array[$choix->getId()] = $prix;
        }
        return $array;
    }

    public function getPrixCatalogueByChoix($choix) {
        $pack = $this->getPackReserve();
        $packOption = $pack->getPackOption($this->getOption());
        $listPrixOption = $packOption->getPrixOption();
        $array = array();
        foreach ($listPrixOption as $prixOption) {
            $choixBis = $prixOption->getChoix();
            if($choix->equals($choixBis)) {
                return $prixOption->getPrix();
            }
        }
    }

    public function getListChoix(){
        $array = array();
        $pack = $this->getPackReserve();
        /** @var PackOptionChoixMultiple $packOption */
        $packOption = $pack->getPackOption($this->getOption());
        $listPrixOption = $packOption->getPrixOption();
        foreach ($listPrixOption as $prixOption) {
            /** @var PrixOptionChoixMultiple $prixOption */
            $choix = $prixOption->getChoix();
            if($prixOption->isPublished()) {
                $array[] = $choix;
            }
        }
        return $array;

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
     * Set choix
     *
     * @param \stdClass $choix
     * @return OptionChoixMultipleReserve
     */
    public function setChoix($choix) {
        $this->choix = $choix;
        $this->setPrix($this->getPrixCatalogueByChoix($this->getChoix()));

        return $this;
    }

    /**
     * Get choix
     *
     * @return \stdClass 
     */
    public function getChoix() {
        return $this->choix;
    }

}
