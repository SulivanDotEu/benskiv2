<?php

namespace Benski\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\UserBundle\Entity\PersonRepository")
 */
class Person
{
    
    function __construct() {
        $this->setAddress(new Address());
    }

    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    protected $lastName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfBirth", type="date", nullable=true)
     */
    protected $dateOfBirth;

    /**
     * @var integer
     *
     * @ORM\Column(name="taille", type="integer", nullable=true)
     */
    protected $taille;

    /**
     * @var integer
     *
     * @ORM\Column(name="poid", type="integer", nullable=true)
     */
    protected $poid;

    /**
     * @ORM\OneToOne(
     *      targetEntity="Benski\UserBundle\Entity\Address",
     *      cascade="all"
     * )
     */
    protected $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="footSize", type="integer", nullable=true)
     */
    protected $footSize;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="string", length=50, nullable=true)
     */
    protected $phoneNumber;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="gender", type="integer", nullable=true)
     */
    protected $gender;
    
    


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
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return Person
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    
        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     * @return Person
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    
        return $this;
    }

    /**
     * Get taille
     *
     * @return integer 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poid
     *
     * @param integer $poid
     * @return Person
     */
    public function setPoid($poid)
    {
        $this->poid = $poid;
    
        return $this;
    }

    /**
     * Get poid
     *
     * @return integer 
     */
    public function getPoid()
    {
        return $this->poid;
    }

    /**
     * Set address
     *
     * @param \stdClass $address
     * @return Person
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set footSize
     *
     * @param integer $footSize
     * @return Person
     */
    public function setFootSize($footSize)
    {
        $this->footSize = $footSize;
    
        return $this;
    }

    /**
     * Get footSize
     *
     * @return integer 
     */
    public function getFootSize()
    {
        return $this->footSize;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     * @return Person
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    
        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return integer 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}