<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Entity\Pack;

/**
 * SejourPack
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\SejourPackRepository")
 */
class SejourPack
{
   
    /**
    * @var Sejour
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Sejour", inversedBy="packs")
    */
    protected $sejour;

    /**
    * @var Pack
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Pack", inversedBy="sejours")
    */
    protected $pack;



    /**
     * Set sejour
     *
     * @param \stdClass $sejour
     * @return SejourPack
     */
    public function setSejour($sejour)
    {
        $this->sejour = $sejour;
    
        return $this;
    }

    /**
     * Get sejour
     *
     * @return \stdClass 
     */
    public function getSejour()
    {
        return $this->sejour;
    }

    /**
     * Set pack
     *
     * @param \stdClass $pack
     * @return SejourPack
     */
    public function setPack($pack)
    {
        $this->pack = $pack;
    
        return $this;
    }

    /**
     * Get pack
     *
     * @return \stdClass 
     */
    public function getPack()
    {
        return $this->pack;
    }
}
