<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SejourAppartement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\SejourAppartementRepository")
 */
class SejourAppartement
{
    /**
     * @var \stdClass
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Appartement")
     */
    
    private $appartement;

    /**
     * @var \stdClass
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Sejour")
     */
    private $sejour;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;


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
     * Set appartement
     *
     * @param \stdClass $appartement
     * @return SejourAppartement
     */
    public function setAppartement($appartement)
    {
        $this->appartement = $appartement;
    
        return $this;
    }

    /**
     * Get appartement
     *
     * @return \stdClass 
     */
    public function getAppartement()
    {
        return $this->appartement;
    }

    /**
     * Set sejour
     *
     * @param \stdClass $sejour
     * @return SejourAppartement
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
     * Set prix
     *
     * @param integer $prix
     * @return SejourAppartement
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
     * Set stock
     *
     * @param integer $stock
     * @return SejourAppartement
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    
        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }
}
