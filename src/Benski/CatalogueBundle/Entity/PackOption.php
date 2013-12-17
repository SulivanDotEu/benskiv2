<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\CatalogueBundle\Entity\Pack;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;

/**
 * PackOption
 * 
 * 
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\PackOptionRepository")
 */
class PackOption
{


   /**
    * @var Pack
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Pack", inversedBy="packOptions")
    */
   protected $pack;

    /**
    * @var AbstractOption
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Option\AbstractOption")
    * @ORM\JoinColumn(onDelete="CASCADE")
    */
    protected $abstractOption;


    public function getOption(){
       return $this->getAbstractOption();
    }

    /**
     * Set pack
     *
     * @param \stdClass $pack
     * @return PackOption
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

    /**
     * Set abstractOption
     *
     * @param \stdClass $abstractOption
     * @return PackOption
     */
    public function setAbstractOption($abstractOption)
    {
        $this->abstractOption = $abstractOption;
    
        return $this;
    }

    /**
     * Get abstractOption
     *
     * @return \stdClass 
     */
    public function getAbstractOption()
    {
        return $this->abstractOption;
    }
}
