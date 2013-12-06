<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pack
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\PackRepository")
 */
class Pack {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Benski\CatalogueBundle\Entity\SejourPack", mappedBy="pack")
     * 
     * @var type 
     */
    protected $sejours;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="qualite", type="integer")
     */
    protected $qualite;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    protected $prix;

    /**
     * @var Pack
     * @ORM\OneToMany(
     *      targetEntity = "Benski\CatalogueBundle\Entity\PackOption",
     *      mappedBy="pack",
     *      fetch="EAGER")
     */
    protected $packOptions;

    public function __toString() {
        return '' . $this->getId() . ' : ' . $this->getNom() . ' (' . $this->getQualite() . ')';
    }
    
    public function getOptionsIndividuelles(){
        return $this->getOptionByType(Option\AbstractOption::$TYPE_INDIVIDUEL);
    }
    

    public function getOptionByType($type) {
        $list = array();
        $options = $this->getOptions();
        foreach ($options as $option) {
            /* @var $option AbstractOption */
            if ($option->getType() == $type)
                $list[] = $option;
        }
        return $list;
    }

    public function getPackOptionACocher() {
        $temp = array();
        foreach ($this->getPackOptions() as $packOption) {
            $option = $packOption->getOption();
            if ($option instanceof Option\OptionACocher) {
                $temp[] = $packOption;
            }
        }
        return $temp;
    }

    public function getPackOptionChoixMultiple() {
        $temp = array();
        foreach ($this->getPackOptions() as $packOption) {
            $option = $packOption->getOption();
            if ($option instanceof Option\OptionChoixMultiple) {
                $temp[] = $packOption;
            }
        }
        return $temp;
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
     * Set nom
     *
     * @param string $nom
     * @return Pack
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set qualit�
     *
     * @param integer $qualit�
     * @return Pack
     */
    public function setQualite($qualite) {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * Get qualit�
     *
     * @return integer 
     */
    public function getQualite() {
        return $this->qualite;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Pack
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->sejours = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sejours
     *
     * @param \Benski\CatalogueBundle\Entity\SejourPack $sejours
     * @return Pack
     */
    public function addSejour(\Benski\CatalogueBundle\Entity\SejourPack $sejours) {
        $this->sejours[] = $sejours;

        return $this;
    }

    /**
     * Remove sejours
     *
     * @param \Benski\CatalogueBundle\Entity\SejourPack $sejours
     */
    public function removeSejour(\Benski\CatalogueBundle\Entity\SejourPack $sejours) {
        $this->sejours->removeElement($sejours);
    }

    /**
     * Get sejours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSejours() {
        return $this->sejours;
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions() {
        $list = array();
        $packOptions = $this->getPackOptions();
        foreach ($packOptions as $packOption) {
            $list[] = $packOption->getAbstractOption();
        }
        return $list;
    }

    /**
     * Add packOptions
     *
     * @param \Benski\CatalogueBundle\Entity\PackOption $packOptions
     * @return Pack
     */
    public function addPackOption(\Benski\CatalogueBundle\Entity\PackOption $packOptions) {
        $this->packOptions[] = $packOptions;

        return $this;
    }

    /**
     * Remove packOptions
     *
     * @param \Benski\CatalogueBundle\Entity\PackOption $packOptions
     */
    public function removePackOption(\Benski\CatalogueBundle\Entity\PackOption $packOptions) {
        $this->packOptions->removeElement($packOptions);
    }

    /**
     * Get packOptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPackOptions() {
        return $this->packOptions;
    }

}
