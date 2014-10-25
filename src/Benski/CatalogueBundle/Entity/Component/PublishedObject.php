<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 08-10-14
 * Time: 21:01
 */

namespace Benski\CatalogueBundle\Entity\Component;
use Doctrine\ORM\Mapping as ORM;


trait PublishedObject {

    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="published", nullable=true)
     */
    protected $published;

    /**
     * @return boolean
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param boolean $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

} 