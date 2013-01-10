<?php

namespace Socialgeo\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * District
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Socialgeo\EventBundle\Entity\DistrictRepository")
 */
class District
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="events", type="integer")
     */
    private $events;

    /**
     * @var integer
     *
     * @ORM\Column(name="media", type="integer")
     */
    private $media;


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
     * Set name
     *
     * @param string $name
     * @return District
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set events
     *
     * @param integer $events
     * @return District
     */
    public function setEvents($events)
    {
        $this->events = $events;
    
        return $this;
    }

    /**
     * Get events
     *
     * @return integer 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set media
     *
     * @param integer $media
     * @return District
     */
    public function setMedia($media)
    {
        $this->media = $media;
    
        return $this;
    }

    /**
     * Get media
     *
     * @return integer 
     */
    public function getMedia()
    {
        return $this->media;
    }
}
