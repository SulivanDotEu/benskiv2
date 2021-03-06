<?php

namespace Benski\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ReservationBundle\Entity\PaiementRepository")
 */
class Paiement {

    public static $STATUS_EN_ATTENTE = 10;
    public static $STATUS_NOTIF_ENVOYE_USER = 20;
    public static $STATUS_RECU = 30;
    
    public static $MODE_NON_DEFINI = 30;
    public static $MODE_PAYPAL = 10;
    public static $MODE_VIREMENT = 20;
    public static $MODE_LIQUIDE = 40;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\ReservationBundle\Entity\ReservationImpl",
     *      inversedBy="paiements")
     */
    private $reservation;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(
     *      targetEntity="Benski\UserBundle\Entity\User",
     *      inversedBy="paiements")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=100, nullable=true)
     */
    private $code;

    /**
     * @var integer
     *
     * @ORM\Column(name="mode", type="integer")
     */
    private $mode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLimite", type="date")
     */
    private $dateLimite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReception", type="date", nullable=true)
     */
    private $dateReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNotificationReception", type="date", nullable=true)
     */
    private $dateNotificationReception;

    /**
     * @var string
     *
     * @ORM\Column(name="compteCrediteur", type="string", length=255, nullable=true)
     */
    private $compteCrediteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer")
     */
    private $statut;
    
    public function estEnRetard(){
        if($this->getStatut() == self::$STATUS_RECU) return false;
        $today = new \DateTime('NOW');
        if($today->getTimestamp() > $this->getDateLimite()->getTimestamp()){
            return true;
        }
        return false;
    }
    
    public function bientotAEcheance(){
        $oneWeek = 60*60*24*7;
        $today = new \DateTime('NOW');
        if($this->getStatut() == self::$STATUS_RECU) return false;
        if($today->getTimestamp() > ($this->getDateLimite()->getTimestamp()-$oneWeek )){
            return true;
        }
        return false;
    }
    
    public function estSolde(){
        if($this->getStatut() == self::$STATUS_RECU) return true;
        return false;
    }


    public function getSolde(){
        return $this->getMontant() - $this->getMontantRecu();
    }

    public function getMontantRecu() {
        if ($this->getStatut() == self::$STATUS_RECU) {
            return $this->getMontant();
        }
        return 0;
    }

    public function toArray(){
        return array(
            'id' => $this->getId(),
//            'reservationId' => $this->getReservation()->getId(),
            'montant' => $this->getMontant(),
            "code" => $this->getCode(),
            "mode" => $this->getMode(),
            "dateLimite" => $this->getDateLimite()->format("d/m/Y"),
        );
    }

    function __construct() {
        $this->statut = self::$STATUS_EN_ATTENTE;
        $this->mode = self::$MODE_NON_DEFINI;
        $this->dateLimite = new \DateTime("NOW");
        $this->dateLimite->add(new \DateInterval('P1W'));
    }

    public function __toString()
    {
        return "Paiement #".$this->getId().' ('.$this->getMontant().' €)';
    }


    public function initCode(){
        $randomCode = ($this->generateRandomString(10));
        $verif = bcmod($randomCode, 97);
        $this->setCode($randomCode.$verif);
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
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
     * Set montant
     *
     * @param integer $montant
     * @return Paiement
     */
    public function setMontant($montant) {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer 
     */
    public function getMontant() {
        return $this->montant;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Paiement
     */
    public function setCode($code) {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set mode
     *
     * @param integer $mode
     * @return Paiement
     */
    public function setMode($mode) {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return integer 
     */
    public function getMode() {
        return $this->mode;
    }

    /**
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     * @return Paiement
     */
    public function setDateLimite($dateLimite) {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime 
     */
    public function getDateLimite() {
        return $this->dateLimite;
    }

    /**
     * Set dateReception
     *
     * @param \DateTime $dateReception
     * @return Paiement
     */
    public function setDateReception($dateReception) {
        $this->dateReception = $dateReception;

        return $this;
    }

    /**
     * Get dateReception
     *
     * @return \DateTime 
     */
    public function getDateReception() {
        return $this->dateReception;
    }

    /**
     * Set dateNotificationReception
     *
     * @param \DateTime $dateNotificationReception
     * @return Paiement
     */
    public function setDateNotificationReception($dateNotificationReception) {
        $this->dateNotificationReception = $dateNotificationReception;

        return $this;
    }

    /**
     * Get dateNotificationReception
     *
     * @return \DateTime 
     */
    public function getDateNotificationReception() {
        return $this->dateNotificationReception;
    }

    /**
     * Set compteCrediteur
     *
     * @param string $compteCrediteur
     * @return Paiement
     */
    public function setCompteCrediteur($compteCrediteur) {
        $this->compteCrediteur = $compteCrediteur;

        return $this;
    }

    /**
     * Get compteCrediteur
     *
     * @return string 
     */
    public function getCompteCrediteur() {
        return $this->compteCrediteur;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     * @return Paiement
     */
    public function setStatut($statut) {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer 
     */
    public function getStatut() {
        return $this->statut;
    }

    /**
     * Set reservation
     *
     * @param \Benski\ReservationBundle\Entity\ReservationImpl $reservation
     * @return Paiement
     */
    public function setReservation(\Benski\ReservationBundle\Entity\ReservationImpl $reservation = null) {
        $this->reservation = $reservation;
        $user = $this->reservation->getResponsable();
        $this->setUser($user);

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Benski\ReservationBundle\Entity\ReservationImpl 
     */
    public function getReservation() {
        return $this->reservation;
    }

    /**
     * Set user
     *
     * @param \Benski\UserBundle\Entity\User $user
     * @return Paiement
     */
    public function setUser(\Benski\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Benski\UserBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

}
