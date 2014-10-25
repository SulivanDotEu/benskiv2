<?php

namespace Benski\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Benski\CommonBundle\Entity\VersionedObject;
use Benski\CatalogueBundle\Entity\Sejour;

/**
 * Appartement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\AppartementRepository")
 */
class Appartement extends VersionedObject
{

    public function __toString()
    {
        return "" . $this->getNom() . " [" . $this->getDestination()
        . "] [" . $this->getQualite()
        . "][" . $this->getNombreLits() . "]";
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
     * @var Benski\CatalogueBundle\Entity\Destination
     * @ORM\ManyToOne(targetEntity = "Benski\CatalogueBundle\Entity\Destination")
     */
    protected $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adminId", type="string", length=255, nullable=true)
     */
    protected $adminId;

    /**
     * @var integer
     *
     * @ORM\Column(name="qualite", type="smallint")
     */
    protected $qualite;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreLits", type="smallint")
     */
    protected $nombreLits;

    /**
     * @ORM\OneToMany(targetEntity="Benski\CatalogueBundle\Entity\SejourAppartement", mappedBy="appartement")
     *
     * @var type
     */
    protected $sejours;

    /**
     * @var ContentInterface
     * @ORM\ManyToOne(targetEntity="Benski\CatalogueBundle\Entity\ContentInterface", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $content;


    public function getPrix(Sejour $sejour, $nombrePersonnes)
    {
        $sejoursAppartements = $this->getSejours();
        foreach ($sejoursAppartements as $link) {
            /* @var $link SejourAppartement */
            if ($link->getSejour()->equals($sejour)) {
                $prix = $link->prixParPersonne($nombrePersonnes);
                return $prix;
            }
        }
        throw new \LogicException('Observation d\'un appartement n\'appartenant pas au séjour fourni');
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

    /**
     * Set nom
     *
     * @param string $nom
     * @return Appartement
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
     * Set qualite
     *
     * @param integer $qualite
     * @return Appartement
     */
    public function setQualite($qualite)
    {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * Get qualite
     *
     * @return integer
     */
    public function getQualite()
    {
        return $this->qualite;
    }

    /**
     * Set nombreLits
     *
     * @param integer $nombreLits
     * @return Appartement
     */
    public function setNombreLits($nombreLits)
    {
        $this->nombreLits = $nombreLits;

        return $this;
    }

    /**
     * Get nombreLits
     *
     * @return integer
     */
    public function getNombreLits()
    {
        return $this->nombreLits;
    }

    /**
     * Set destination
     *
     * @param \Benski\CatalogueBundle\Entity\Destination $destination
     * @return Appartement
     */
    public function setDestination(\Benski\CatalogueBundle\Entity\Destination $destination = null)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \Benski\CatalogueBundle\Entity\Destination
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sejours = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sejour
     *
     * @param \Benski\CatalogueBundle\Entity\SejourAppartement $sejour
     * @return Appartement
     */
    public function addSejours(\Benski\CatalogueBundle\Entity\SejourAppartement $sejours)
    {
        $this->sejours[] = $sejours;

        return $this;
    }

    /**
     * Remove sejour
     *
     * @param \Benski\CatalogueBundle\Entity\SejourAppartement $sejour
     */
    public function removeSejours(\Benski\CatalogueBundle\Entity\SejourAppartement $sejours)
    {
        $this->sejours->removeElement($sejours);
    }

    /**
     * Get sejour
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSejours()
    {
        return $this->sejours;
    }


    /**
     * Set AdminId
     *
     * @param string $adminId
     * @return Destination
     */
    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;

        return $this;
    }

    /**
     * Get AdminId
     *
     * @return string
     */
    public function getAdminId()
    {
        return $this->adminId;
    }


    /**
     * Add sejours
     *
     * @param \Benski\CatalogueBundle\Entity\SejourAppartement $sejours
     * @return Appartement
     */
    public function addSejour(\Benski\CatalogueBundle\Entity\SejourAppartement $sejours)
    {
        $this->sejours[] = $sejours;

        return $this;
    }

    /**
     * Remove sejours
     *
     * @param \Benski\CatalogueBundle\Entity\SejourAppartement $sejours
     */
    public function removeSejour(\Benski\CatalogueBundle\Entity\SejourAppartement $sejours)
    {
        $this->sejours->removeElement($sejours);
    }

    /**
     * Set content
     *
     * @param \Benski\WebsiteBundle\Entity\BusinessContent $content
     * @return Appartement
     */
    public function setContent(\Benski\WebsiteBundle\Entity\BusinessContent $content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \Benski\WebsiteBundle\Entity\BusinessContent
     */
    public function getContent()
    {
        return $this->content;
    }
}
