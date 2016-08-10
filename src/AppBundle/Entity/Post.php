<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Resource\Model\TranslatableInterface;


/**
 * @ORM\Entity()
 */
class Post implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishedAt;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getTitle() 
    {
        return $this->translate()->getTitle();
    }
    
    public function setTitle($title)
    {
        $this->translate()->setTitle($title);
    }

    public function getBody() 
    {
        return $this->translate()->getBody();
    }
    
    public function setBody($body)
    {
        $this->translate()->setBody($body);
    }

    public function getPublishedAt() 
    {
        return $this->publishedAt;
    }
    
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }
}
