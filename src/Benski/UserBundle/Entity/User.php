<?php

namespace Benski\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\UserBundle\Entity\UserRepository")
 */
class User
{
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_ville", type="string", length=255)
     */
    private $adrVille;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_rue", type="string", length=255)
     */
    private $adrRue;

    /**
     * @var integer
     *
     * @ORM\Column(name="adr_num", type="integer")
     */
    private $adrNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="adr_num_boite", type="integer")
     */
    private $adrNumBoite;

    /**
     * @var integer
     *
     * @ORM\Column(name="adr_code_postal", type="integer")
     */
    private $adrCodePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_pays", type="string", length=255)
     */
    private $adrPays;


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
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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

    /**
     * Set tel
     *
     * @param integer $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adrVille
     *
     * @param string $adrVille
     * @return User
     */
    public function setAdrVille($adrVille)
    {
        $this->adrVille = $adrVille;
    
        return $this;
    }

    /**
     * Get adrVille
     *
     * @return string 
     */
    public function getAdrVille()
    {
        return $this->adrVille;
    }

    /**
     * Set ardRue
     *
     * @param string $ardRue
     * @return User
     */
    public function setArdRue($ardRue)
    {
        $this->ardRue = $ardRue;
    
        return $this;
    }

    /**
     * Get ardRue
     *
     * @return string 
     */
    public function getArdRue()
    {
        return $this->ardRue;
    }

    /**
     * Set adrNum
     *
     * @param integer $adrNum
     * @return User
     */
    public function setAdrNum($adrNum)
    {
        $this->adrNum = $adrNum;
    
        return $this;
    }

    /**
     * Get adrNum
     *
     * @return integer 
     */
    public function getAdrNum()
    {
        return $this->adrNum;
    }

    /**
     * Set adrNumBoite
     *
     * @param integer $adrNumBoite
     * @return User
     */
    public function setAdrNumBoite($adrNumBoite)
    {
        $this->adrNumBoite = $adrNumBoite;
    
        return $this;
    }

    /**
     * Get adrNumBoite
     *
     * @return integer 
     */
    public function getAdrNumBoite()
    {
        return $this->adrNumBoite;
    }

    /**
     * Set adrCodePostal
     *
     * @param integer $adrCodePostal
     * @return User
     */
    public function setAdrCodePostal($adrCodePostal)
    {
        $this->adrCodePostal = $adrCodePostal;
    
        return $this;
    }

    /**
     * Get adrCodePostal
     *
     * @return integer 
     */
    public function getAdrCodePostal()
    {
        return $this->adrCodePostal;
    }

    /**
     * Set adrPays
     *
     * @param string $adrPays
     * @return User
     */
    public function setAdrPays($adrPays)
    {
        $this->adrPays = $adrPays;
    
        return $this;
    }

    /**
     * Get adrPays
     *
     * @return string 
     */
    public function getAdrPays()
    {
        return $this->adrPays;
    }
}
