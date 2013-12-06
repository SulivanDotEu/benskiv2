<?php

namespace Benski\CatalogueBundle\Entity\Option;

use Doctrine\ORM\Mapping as ORM;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;

/**
 * OptionChoixMultiple
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\Option\OptionChoixMultipleRepository")
 */
class OptionChoixMultiple extends AbstractOption {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $choixParDefaut;

    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(
     *      targetEntity="Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple",
     *      cascade={"all"},
     *      mappedBy="optionChoixMultiple",
     *      fetch="EAGER")
     * 
     */
    protected $choix;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return parent::getId();
    }

    /**
     * Set choixParDefaut
     *
     * @param \stdClass $choixParDefaut
     * @return OptionChoixMultiple
     */
    public function setChoixParDefaut($choixParDefaut) {
        $this->choixParDefaut = $choixParDefaut;

        return $this;
    }

    /**
     * Get choixParDefaut
     *
     * @return \stdClass 
     */
    public function getChoixParDefaut() {
        return $this->choixParDefaut;
    }

    /**
     * Set choix
     *
     * @param \stdClass $choix
     * @return OptionChoixMultiple
     */
    public function setChoix($choix) {
        $this->choix = $choix;

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

    /**
     * Constructor
     */
    public function __construct() {
        $this->choix = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add choix
     *
     * @param \Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple $choix
     * @return OptionChoixMultiple
     */
    public function addChoix(\Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple $choix) {
        $this->choix[] = $choix;
        return $this;
    }

    /**
     * Remove choix
     *
     * @param \Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple $choix
     */
    public function removeChoix(\Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple $choix) {
        $this->choix->removeElement($choix);
    }

}