<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\CatalogueBundle\Entity\PackOption;

/**
 * PackOptionChoixMultiple
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\PackOptionChoixMultipleRepository")
 */
class PackOptionChoixMultiple extends PackOption
{

    
   /**
    * @var Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple
    *
    * @ORM\OneToMany(
    *       targetEntity = "Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple",
    *       mappedBy="packOption",
    *       cascade={"all"},
    *       fetch="EAGER")
    */
   protected $prixOption;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prixOption = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add prixOption
     *
     * @param \Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple $prixOption
     * @return PackOptionChoixMultiple
     */
    public function addPrixOption(\Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple $prixOption)
    {
        $this->prixOption[] = $prixOption;
    
        return $this;
    }

    /**
     * Remove prixOption
     *
     * @param \Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple $prixOption
     */
    public function removePrixOption(\Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple $prixOption)
    {
        $this->prixOption->removeElement($prixOption);
    }

    /**
     * Get prixOption
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrixOption()
    {
        return $this->prixOption;
    }
}