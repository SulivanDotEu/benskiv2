<?php

namespace Benski\WebsiteBundle\Entity;

use Benski\CatalogueBundle\Entity\ContentInterface;
use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Entity\Block;
use Walva\SimpleCmsBundle\Service\ContentRequest;

/**
 * BusinessContent
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BusinessContent implements ContentInterface
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
     * @var Block
     *
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\Block")
     * @ORM\JoinColumn(nullable=true)
     */
    private $block;

    /**
     * @var Page
     *
     * @ORM\OneToOne(targetEntity="Benski\WebsiteBundle\Entity\Page")
     * @ORM\JoinColumn(nullable=true)
     */
    private $page;

    public function getContent(){
        $request = new ContentRequest();
        $request->setLanguage('fr');
        return $this->getBlock()->getContentForRequest($request);
    }

    public function getWebPage(){
        return $this->getWebPage();
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
     * Set block
     *
     * @param integer $block
     * @return BusinessContent
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return Block
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set page
     *
     * @param integer $page
     * @return BusinessContent
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return Page
     */
    public function getPage()
    {
        return $this->page;
    }
}
