<?php

namespace Benski\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ContentBundle\Entity\LinkRepository")
 */
class Link
{
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
     * @ORM\ManyToMany(
     *      targetEntity="Benski\ContentBundle\Entity\Article"
     *      )
     */
    protected $articles;

    /**
     * @var string
     *
     * @ORM\Column(name="className", type="string", length=255)
     */
    protected $className;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerId", type="integer")
     */
    protected $ownerId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

 

    
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    
        return $this;
    }

    /**
     * Get ownerId
     *
     * @return integer 
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set className
     *
     * @param string $className
     * @return Link
     */
    public function setClassName($className)
    {
        $this->className = $className;
    
        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Add articles
     *
     * @param \Benski\ContentBundle\Entity\Article $articles
     * @return Link
     */
    public function addArticle(\Benski\ContentBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;
    
        return $this;
    }

    /**
     * Remove articles
     *
     * @param \Benski\ContentBundle\Entity\Article $articles
     */
    public function removeArticle(\Benski\ContentBundle\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}