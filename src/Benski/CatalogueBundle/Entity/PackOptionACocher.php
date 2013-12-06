<?php

namespace Benski\CatalogueBundle\Entity;

use Benski\CatalogueBundle\Entity\PackOption;
use Doctrine\ORM\Mapping as ORM;

/**
 * PackOptionACocher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\PackOptionACocherRepository")
 */
class PackOptionACocher extends PackOption
{

    /**
     * @var boolean
     *
     * @ORM\Column(name="cocheParDefaut", type="boolean", nullable=true)
     */
    protected $cocheParDefaut;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    protected $prix;


    /**
     * Set cocheParDefaut
     *
     * @param boolean $cocheParDefaut
     * @return PackOptionACocher
     */
    public function setCocheParDefaut($cocheParDefaut)
    {
        $this->cocheParDefaut = $cocheParDefaut;
    
        return $this;
    }

    /**
     * Get cocheParDefaut
     *
     * @return boolean 
     */
    public function getCocheParDefaut()
    {
        return $this->cocheParDefaut;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return PackOptionACocher
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
