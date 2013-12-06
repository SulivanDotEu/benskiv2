<?php

namespace Benski\CatalogueBundle\Entity\Option;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChoixOptionMultiple
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\Option\ChoixOptionMultipleRepository")
 */
class ChoixOptionMultiple
{
    
    public function __toString() {
        return $this->getId().' - '.$this->getIntitule();
    }

    
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
     * @ORM\ManyToOne(targetEntity="Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple", inversedBy="choix", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $optionChoixMultiple;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    protected $intitule;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     * @return ChoixOptionMultiple
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
     * Set description
     *
     * @param string $description
     * @return ChoixOptionMultiple
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
     * Set prix
     *
     * @param integer $prix
     * @return ChoixOptionMultiple
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



    /**
     * Set option
     *
     * @param \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple $option
     * @return ChoixOptionMultiple
     */
    public function setOptionChoixMultiple(\Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple $optionChoixMultiple = null)
    {
        if($this->optionChoixMultiple == $optionChoixMultiple) return;
        $this->optionChoixMultiple = $optionChoixMultiple;
    
        return $this;
    }

    /**
     * Get option
     *
     * @return \Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple 
     */
    public function getOptionChoixMultiple()
    {
        return $this->optionChoixMultiple;
    }
    
    public function equals($object){
        if ($object == null) return false;
        if (!$object instanceof ChoixOptionMultiple) return false;
        if ($object == $this) return true;
        if($this->getId() == null) return false;
        if ($this->getId() != $object->getId()) return false;
        return true;
    }
}