<?php

namespace Benski\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Benski\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser {

    public static $ROLE_ADMIN = 'ROLE_ADMIN';
    public static $ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    public static $ROLE_USER = 'ROLE_USER';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(
     *      targetEntity="Benski\UserBundle\Entity\Person",
     *      cascade="all"
     * )
     */
    protected $person;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Benski\ReservationBundle\Entity\Paiement",
     *      mappedBy="user")
     */
    private $paiements;

    public function getSolde(){
        $solde = 0;
        foreach ($this->getPaiements() as $paiement) {
            /* @var $paiement \Benski\ReservationBundle\Entity\Paiement */
            $solde += $paiement->getSolde();
        }
        return $solde;
    }
    
    
    
    public function setEmail($email) {
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
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
     * Set person
     *
     * @param \Benski\UserBundle\Entity\Person $person
     * @return User
     */
    public function setPerson(\Benski\UserBundle\Entity\Person $person = null) {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Benski\UserBundle\Entity\Person 
     */
    public function getPerson() {
        return $this->person;
    }

    public function getPaiements() {
        return $this->paiements;
    }

    public function setPaiements($paiements) {
        $this->paiements = $paiements;
        return $this;
    }

    function __construct() {
        parent::__construct();
        $this->setPerson(new Person());
    }

    public function isAdmin() {
        $roles = $this->getRoles();
        foreach ($roles as $role) {
            if ($role == self::$ROLE_SUPER_ADMIN)
                return true;
            if ($role == self::$ROLE_ADMIN)
                return true;
        }
        return false;
    }

}
