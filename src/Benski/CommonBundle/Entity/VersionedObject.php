<?php

namespace Benski\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VersionedObject
 *
 * @ORM\MappedSuperclass
 */
abstract class VersionedObject
{


    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer")
     */
    protected $version = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    protected $published = false;
    
    public function isPublished(){
       if($this->published) return "yes";
       return "no";
    }

    public function incrementVersion(){
       $this->setVersion($this->getVersion()+1);
    }

    

    /**
     * Set version
     *
     * @param integer $version
     * @return VersionedObject
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return VersionedObject
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }
}
