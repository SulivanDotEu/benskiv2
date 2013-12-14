<?php

namespace Benski\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Benski\ContentBundle\Entity\NewsRepository")
 */
class News
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
     * @var Benski\ContentBundle\Entity\Article
     *
     * @ORM\OneToOne(
     *      targetEntity="Benski\ContentBundle\Entity\Article"
     *  )
     */
    protected $article;


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
     * Set article
     *
     * @param \Benski\ContentBundle\Entity\Article $article
     * @return News
     */
    public function setArticle(\Benski\ContentBundle\Entity\Article $article = null)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return \Benski\ContentBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
}