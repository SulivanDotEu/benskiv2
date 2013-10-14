<?php

namespace Benski\CatalogueBundle\Entity\Option;

use Doctrine\ORM\Mapping as ORM;
use Benski\CommonBundle\Entity\VersionedObject;

/**
 * AbstractOption
 *
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 */
class AbstractOption extends VersionedObject {

    public static $TYPE_INDIVIDUEL = 2;
    public static $TYPE_GROUPE = 3;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="explication", type="text", nullable=true)
     */
    private $explication;

    /**
     * Set nom
     *
     * @param string $nom
     * @return AbstractOption
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
     * Set description
     *
     * @param string $description
     * @return AbstractOption
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return AbstractOption
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set explication
     *
     * @param string $explication
     * @return AbstractOption
     */
    public function setExplication($explication) {
        $this->explication = $explication;

        return $this;
    }

    /**
     * Get explication
     *
     * @return string 
     */
    public function getExplication() {
        return $this->explication;
    }
    
    

    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

}