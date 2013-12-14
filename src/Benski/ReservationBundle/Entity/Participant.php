<?php

namespace Benski\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\ParticipantRepository")
 */
class Participant {

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
     * @ORM\OneToOne(
     *      targetEntity="Benski\UserBundle\Entity\Person",
     *      cascade="ALL")
     */
    protected $personne;

    /**
     * @var \stdClass
     *
     * @ORM\Column(type="integer")
     */
    protected $numero = 0;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\AppartementReserve",
     *      inversedBy="participants"
     * )
     */
    protected $appartementReserve;

    /**
     * @var Option\OptionReserve
     *
     * @ORM\OneToMany(
     *      targetEntity="Benski\ReservationBundle\Entity\Option\OptionReserve",
     *      mappedBy="participant",
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
        $total = $this->getTotalOptions();
        $total += $this->getAppartementReserve()->getPrix();
        return $total;
    }
    
    
    public function getOptionReserveByOption($option){
        $listOptionsReserves = $this->getOptionsReserves();
        foreach ($listOptionsReserves as $optionReserve) {
            /* @var $optionReserve Option\OptionReserve */
            if($optionReserve->getOption()->getId() == $option->getId()){
                return $optionReserve;
            }
        }
        throw new \LogicException('comportement incorrecte Participant->getOptionReserveByOption()');
    }
    
    public function equals($object){
        if ($object == null) return false;
        if (!$object instanceof Participant) return false;
        if ($object == $this) return true;
        if($this->getId() == null) return false;
        if ($this->getId() != $object->getId()) return false;
        return true;
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
     * Set personne
     *
     * @param \stdClass $personne
     * @return Participant
     */
    public function setPersonne($personne) {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get personne
     *
     * @return \Benski\UserBundle\Entity\Person 
     */
    public function getPersonne() {
        return $this->personne;
    }



    /**
     * Set appartementReserve
     *
     * @param AppartementReserve $appartementReserve
     * @return Participant
     */
    public function setAppartementReserve($appartementReserve) {
        if ($appartementReserve->equals($this->getAppartementReserve())){
            return;
        }
        $this->appartementReserve = $appartementReserve;
        $appartementReserve->addParticipant($this);
        

        return $this;
    }

    /**
     * Get appartementReserve
     *
     * @return AppartementReserve 
     */
    public function getAppartementReserve() {
        return $this->appartementReserve;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Participant
     */
    public function setNumero($numero) {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->optionsReserves = new \Doctrine\Common\Collections\ArrayCollection();
        $this->personne = new \Benski\UserBundle\Entity\Person();
    }
    
    /**
     * Add optionsReserves
     *
     * @param \Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves
     * @return Participant
     */
    public function addOptionsReserve(\Benski\ReservationBundle\Entity\Option\OptionReserve $optionsReserves)
    {
        if($optionsReserves == null OR
                $this->getOptionsReserves()->contains($optionsReserves)) return;
        $this->optionsReserves[] = $optionsReserves;
    
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
}