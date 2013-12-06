<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrixOptionChoixMultiple
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\PrixOptionChoixMultipleRepository")
 */
class PrixOptionChoixMultiple {

   /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   protected $id;

   /**
    * @var integer
    *
    * @ORM\Column(name="prix", type="integer")
    */
   protected $prix;

   /**
    * @var Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple
    *
    * @ORM\ManyToOne(
    *       targetEntity = "Benski\CatalogueBundle\Entity\Option\ChoixOptionMultiple",
    *       fetch="EAGER")
    */
   protected $choix;

   /**
    * @var Benski\CatalogueBundle\Entity\PrixOptionChoixMultiple
    *
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\PackOptionChoixMultiple", inversedBy="prixOption")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="pack_id", referencedColumnName="pack_id"),
    *   @ORM\JoinColumn(name="abstractOption_id", referencedColumnName="abstractOption_id")
    * })
    */
   protected $packOption;

   /**
    * Get id
    *
    * @return integer 
    */
   public function getId() {
      return $this->id;
   }

   /**
    * Set prix
    *
    * @param integer $prix
    * @return PrixOptionChoixMultiple
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
    * Set packOption
    *
    * @param \stdClass $packOption
    * @return PrixOptionChoixMultiple
    */
   public function setPackOption($packOption) {
      $this->packOption = $packOption;

      return $this;
   }

   /**
    * Get packOption
    *
    * @return \stdClass 
    */
   public function getPackOption() {
      return $this->packOption;
   }

   /**
    * Set choix
    *
    * @param \stdClass $choix
    * @return PrixOptionChoixMultiple
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

}
