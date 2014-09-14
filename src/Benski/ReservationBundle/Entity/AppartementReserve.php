<?php

namespace Benski\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\CatalogueBundle\Entity\Option\AbstractOption;
use Benski\CatalogueBundle\Entity\Option\OptionChoixMultiple;
use Benski\CatalogueBundle\Entity\Option\OptionACocher;
use Benski\CatalogueBundle\Entity\Appartement;

/**
 * AppartementReserve
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\AppartementReserveRepository")
 */
class AppartementReserve {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var array
     *
     * @ORM\Column(type="integer")
     */
    protected $numero = 0;

    /**
     * @var array
     *
     * @ORM\OneToMany(
     *      targetEntity="Benski\ReservationBundle\Entity\Participant",
     *      mappedBy="appartementReserve",
     *      orphanRemoval=true,
     *      cascade="ALL"
     * )
     */
    protected $participants;

    /**
     * @var array
     *
     * @ORM\Column(type="integer")
     */
    protected $nombrePersonnes;

    /**
     * @var array
     *
     * @ORM\Column(type="integer")
     */
    protected $prix;

    /**
     * @var \Benski\ReservationBundle\Entity\PackReserve
     *
     * @ORM\OneToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\PackReserve",
     *      inversedBy="appartementReserve",
     *      orphanRemoval=true,
     *      cascade="ALL")
     */
    protected $packReserve;

    /**
     * @var \Benski\CatalogueBundle\Appartement
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\CatalogueBundle\Entity\Appartement"
     * )
     */
    protected $appartement;

    /**
     * @var \Benski\ReservationBundle\Entity\SejourReserve
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\SejourReserve",
     *      inversedBy="appartementsReserves"
     * )
     */
    protected $sejourReserve;

    /**
     * @var Option\OptionReserve
     *
     * @ORM\OneToMany(
     *      targetEntity="Benski\ReservationBundle\Entity\Option\OptionReserve",
     *      mappedBy="appartement",
     *      orphanRemoval=true,
     *      cascade="ALL"
     * )
     */
    protected $optionsReserves;
    
    public function getTotalOptions(){
        $total = 0;
        foreach ($this->optionsReserves as $optionReserve) {
            $total += $optionReserve->getPrix();
        }
        return $total;
    }
    
    public function getTotal(){
        $total = 0;
        $total += $this->getTotalOptions();
        $total += $this->getPackReserve()->getTotal();
        foreach ($this->participants as $participant) {
            $total += $participant->getTotal();
        }
        return $total;
    }

    public function init() {
        if ($this->appartement == null OR
                $this->nombrePersonnes == null OR
                $this->packReserve == null) {
            throw new \Exception("Initialisation impossible, données manquantes");
        }

        for ($i = 0; $i < $this->nombrePersonnes; $i++) {
            $p = $this->createParticipant($i + 1);
        }
        $this->initPackReserve();
    }


    private function initPackReserve() {
        if ($this->packReserve == null) {
            throw new \Exception("Initialisation impossible, données manquantes : packReserve");
        }
        if ($this->nombrePersonnes == null) {
            throw new \Exception("Initialisation impossible, données manquantes : nombrePersonnes");
        }
        if ($this->participants == null OR $this->participants->isEmpty()) {
            throw new \Exception("Initialisation impossible, données manquantes : Participants");
        }

        // d'abord on s occupe des options de groupe, on va chercher toutes les
        // options de groupes dans le pack et on va les ajouter dans l'appartement
        // qui sert de "groupe"
        $packReserve = $this->getPackReserve();
        $optionsDeGroupe = $packReserve->getOptionByType(AbstractOption::$TYPE_GROUPE);
        foreach ($optionsDeGroupe as $option) {
            $optionReserve = $this->createOptionReserve($option);
            $optionReserve->setAppartement($this);
        }

        // maintenant on va prendre les options individuelles et les lier
        // a chaque participant aux travers d objets OptionsReserves
        $optionsIndiduelles = $packReserve->getOptionByType(AbstractOption::$TYPE_INDIVIDUEL);
        foreach ($this->getParticipants() as $participant) {
            foreach ($optionsIndiduelles as $option) {
                $optionReserve = $this->createOptionReserve($option);
                $optionReserve->setParticipant($participant);
            }
        }
        
        // maintenant que l'on a la référence catalogue de l'appartement 
        // et du sejour, on peut y placer le prix PAR PERSONNE
        $this->setPrix($this
                ->getAppartement()
                ->getPrix(
                        $this->getSejourReserve()->getSejour(),
                        $this->getNombrePersonnes()));
        
    }

    private function createOptionReserve($option) {
        $optionReserve = null;
        if ($option instanceof OptionChoixMultiple) {
            $optionReserve = new Option\OptionChoixMultipleReserve();
        } else if ($option instanceof OptionACocher) {
            $optionReserve = new Option\OptionACocherReserve();
        } else {
            throw new \Exception("Comportement incorrecte, type incompatible"
            . " de l'option");
        }

        $optionReserve->setPackReserve($this->getPackReserve());
        $optionReserve->setOption($option);
        $this->getPackReserve()->addOptionsReserve($optionReserve);
        return $optionReserve;
    }

    private function createParticipant($numero) {
        $p = new Participant();
        $p->setNumero($numero);
        $p->setAppartementReserve($this);
        //$this->setAppartement($this);
        return $p;
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
     * Set participants
     *
     * @param array $participants
     * @return AppartementReserve
     */
    public function setParticipants($participants) {
        $this->participants = $participants;

        return $this;
    }

    /**
     * Get participants
     *
     * @return array 
     */
    public function getParticipants() {
        return $this->participants;
    }

    /**
     * Set packReserve
     *
     * @param PackReserve $packReserve
     * @return AppartementReserve
     */
    public function setPackReserve($packReserve) {
        if($packReserve->equals($this->getPackReserve())) return;
        $this->packReserve = $packReserve;
        $packReserve->setAppartementReserve($this);

        return $this;
    }

    /**
     * Get packReserve
     *
     * @return \stdClass 
     */
    public function getPackReserve() {
        return $this->packReserve;
    }

    /**
     * Set appartement
     *
     * @param \Benski\CatalogueBundle\Entity\Appartement $appartement
     * @return AppartementReserve
     */
    public function setAppartement(Appartement $appartement) {
        $this->appartement = $appartement;

        return $this;
    }

    /**
     * Get appartement
     *
     * @return \stdClass 
     */
    public function getAppartement() {
        return $this->appartement;
    }

    /**
     * Set sejourReserve
     *
     * @param \Benski\ReservationBundle\SejourReserve $sejourReserve
     * @return AppartementReserve
     */
    public function setSejourReserve(\Benski\ReservationBundle\Entity\SejourReserve $sejourReserve = null) {
        if ($sejourReserve == $this->sejourReserve)
            return;

        $this->sejourReserve = $sejourReserve;
        $sejourReserve->addAppartementsReserve($this);
        return $this;
    }

    /**
     * Get sejourReserve
     *
     * @return \Benski\ReservationBundle\SejourReserve 
     */
    public function getSejourReserve() {
        return $this->sejourReserve;
    }

    /**
     * Set nombrePersonnes
     *
     * @param integer $nombrePersonnes
     * @return AppartementReserve
     */
    public function setNombrePersonnes($nombrePersonnes) {
        $this->nombrePersonnes = $nombrePersonnes;

        return $this;
    }

    /**
     * Get nombrePersonnes
     *
     * @return integer 
     */
    public function getNombrePersonnes() {
        return $this->nombrePersonnes;
    }

 

    /**
     * Add participants
     *
     * @param \Benski\ReservationBundle\Entity\Participant $participants
     * @return AppartementReserve
     */
    public function addParticipant(\Benski\ReservationBundle\Entity\Participant $participants) {
        if ($this->participants->contains($participants))
            return;
        $this->participants[] = $participants;
        $participants->setAppartementReserve($this);

        return $this;
    }

    /**
     * Remove participants
     *
     * @param \Benski\ReservationBundle\Entity\Participant $participants
     */
    public function removeParticipant(\Benski\ReservationBundle\Entity\Participant $participants) {
        $this->participants->removeElement($participants);
    }

    public function equals($object) {
        if ($object == null)
            return false;
        if (!$object instanceof AppartementReserve)
            return false;
        if ($object == $this)
            return true;
        if ($this->getId() == null)
            return false;
        if ($this->getId() != $object->getId())
            return false;
        return true;
    }

    /**
     * Add optionsReserves
     *
     * @param \Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves
     * @return AppartementReserve
     */
    public function addOptionsReserve(\Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves)
    {
        if($this->getOptionsReserves()->contains($optionsReserves)) return;
        $this->optionsReserves[] = $optionsReserves;
        $optionsReserves->setAppartement($this);
    
        return $this;
    }

    /**
     * Remove optionsReserves
     *
     * @param \Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves
     */
    public function removeOptionsReserve(\Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves)
    {
        $this->optionsReserves->removeElement($optionsReserves);
    }

    /**
     * Get optionsReserves
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptionsReserves()
    {
        return $this->optionsReserves;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->optionsReserves = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set prix
     *
     * @param integer $prix
     * @return AppartementReserve
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
     * Set numero
     *
     * @param integer $numero
     * @return AppartementReserve
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }
}