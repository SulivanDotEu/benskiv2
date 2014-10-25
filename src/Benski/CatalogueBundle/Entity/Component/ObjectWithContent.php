<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 08-10-14
 * Time: 21:01
 */

namespace Benski\CatalogueBundle\Entity\Component;
use Doctrine\ORM\Mapping as ORM;


trait ObjectWithContent {

    /**
     * @var ContentInterface
     * @ORM\OneToOne(targetEntity="Benski\CatalogueBundle\Entity\ContentInterface", cascade={"all", "persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $content;

    /**
     * Set content
     *
     * @param \Benski\WebsiteBundle\Entity\BusinessContent $content
     * @return Destination
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