<?php

namespace Benski\CatalogueBundle\Entity\Option;

use Doctrine\ORM\Mapping as ORM;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;

/**
 * OptionACocher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\Option\OptionACocherRepository")
 */
class OptionACocher extends AbstractOption
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
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    protected $intitule;

    /**
     * @var boolean
     *
     * @ORM\Column(name="parDefault", type="boolean", nullable=true)
     */
    protected $parDefault;

    /**
     * @var string
     *
     * @ORM\Column(name="infoRequis", type="text", nullable=true)
     */
    protected $infoRequis;


    public function isTypeACocher(){
        return true;
    }
    
    public function isTypeChoixMultiple(){
        return false;
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
     * Set intitule
     *
     * @param string $intitule
     * @return OptionACocher
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set parDefault
     *
     * @param boolean $parDefault
     * @return OptionACocher
     */
    public function setParDefault($parDefault)
    {
        $this->parDefault = $parDefault;
    
        return $this;
    }

    /**
     * Get parDefault
     *
     * @return boolean 
     */
    public function getParDefault()
    {
        return $this->parDefault;
    }

    /**
     * Set infoRequis
     *
     * @param string $infoRequis
     * @return OptionACocher
     */
    public function setInfoRequis($infoRequis)
    {
        $this->infoRequis = $infoRequis;
    
        return $this;
    }

    /**
     * Get infoRequis
     *
     * @return string 
     */
    public function getInfoRequis()
    {
        return $this->infoRequis;
    }
}
