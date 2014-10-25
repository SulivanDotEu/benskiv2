<?php

namespace Benski\CatalogueBundle\Entity;

use Benski\CatalogueBundle\Entity\Component\ObjectWithContent;
use Benski\CatalogueBundle\Entity\Component\PublishedObject;
use Doctrine\ORM\Mapping as ORM;
use Benski\CommonBundle\Entity\VersionedObject;


/**
 * Destination
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\CatalogueBundle\Entity\DestinationRepository")
 */
class Destination
{

    use PublishedObject;
    use ObjectWithContent;

    public function __toString()
    {
        return $this->getNom();
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    protected $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="adminId", type="string", length=255, nullable=true)
     */
    protected $AdminId;




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
     * @return Destination
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
     * Set pays
     *
     * @param string $pays
     * @return Destination
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    public function equals(Destination $var)
    {
        if ($var->getId() == $this->getId()) return true;
        return false;
    }


    /**
     * Set AdminId
     *
     * @param string $adminId
     * @return Destination
     */
    public function setAdminId($adminId)
    {
        $this->AdminId = $adminId;

        return $this;
    }

    /**
     * Get AdminId
     *
     * @return string
     */
    public function getAdminId()
    {
        return $this->AdminId;
    }


}
