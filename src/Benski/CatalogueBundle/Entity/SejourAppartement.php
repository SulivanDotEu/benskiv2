<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\CommonBundle\Entity\VersionedObject;

/**
 * SejourAppartement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\SejourAppartementRepository")
 */
class SejourAppartement extends VersionedObject {

   /**
    * @var Appartement
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Appartement", inversedBy="sejours")
    */
   private $appartement;

   /**
    * @var \stdClass
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Sejour", inversedBy="appartements")
    */
   private $sejour;

   /**
    * @var integer
    *
    * @ORM\Column(name="prix", type="array")
    */
   private $prix;

   /**
    * @var integer
    *
    * @ORM\Column(name="stock", type="integer")
    */
   private $stock;
   
   function getPrixMinimum(){
      $nbrLit = $this->getAppartement()->getNombreLits();
      return $this->getPrix()[$nbrLit];
   }

   function __construct() {
      $this->setPrix(array());
   }

   public function definirPrix($nombrePersonnes, $prix) {
      if ($nombrePersonnes < 1)
         throw new \Exception('Un prix doit etre indiqué
         pour un nombre de personne compris entre 1 et le nombre de lits.');
      if ($nombrePersonnes > $this->getAppartement()->getNombreLits())
         throw new \Exception('Un prix doit etre indiqué
         pour un nombre de personne compris entre 1 et le nombre de lits.');
      $array = $this->getPrix();
      $array[$nombrePersonnes] = $prix;
      $this->setPrix($array);
      return $this;
   }

   public function prixParPersonne($nbrPersonnes) {
      if (isset($this->prix[$nbrPersonnes]))
         return $this->prix[$nbrPersonnes];
      return -1;
   }

   /**
    * Get id
    *
    * @return integer 
    */
   /*
   public function getId() {
      return $this->id;
   }*/

   /**
    * Set appartement
    *
    * @param \stdClass $appartement
    * @return SejourAppartement
    */
   public function setAppartement($appartement) {
      $this->appartement = $appartement;

      return $this;
   }

   /**
    * Get appartement
    *
    * @return Appartement 
    */
   public function getAppartement() {
      return $this->appartement;
   }

   /**
    * Set sejour
    *
    * @param \stdClass $sejour
    * @return SejourAppartement
    */
   public function setSejour($sejour) {
      $this->sejour = $sejour;

      return $this;
   }

   /**
    * Get sejour
    *
    * @return \stdClass 
    */
   public function getSejour() {
      return $this->sejour;
   }

   /**
    * Set prix
    *
    * @param array $prix
    * @return SejourAppartement
    */
   public function setPrix($prix) {
      $this->prix = $prix;

      return $this;
   }

   /**
    * Get prix
    *
    * @return array 
    */
   public function getPrix() {
      return $this->prix;
   }

   /**
    * Set stock
    *
    * @param integer $stock
    * @return SejourAppartement
    */
   public function setStock($stock) {
      $this->stock = $stock;

      return $this;
   }

   /**
    * Get stock
    *
    * @return integer 
    */
   public function getStock() {
      return $this->stock;
   }

}
