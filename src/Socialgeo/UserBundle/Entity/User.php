<?php
// src/Socialgeo/UserBundle/Entity/User.php

namespace Socialgeo\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */


class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;




    protected $username;

    /**
     * @ORM\Column(type="string", length=255)
     *

     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $gender;

    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $nationality;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $street;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $postalcode;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $city;

    /**
     * @ORM\OneToMany(targetEntity="Socialgeo\EventBundle\Entity\Events", mappedBy="owner")
     */
    protected $events;

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }



    public function setEmail($email)
    {
        return parent::setEmail($email);
    }

    public function setUsername($username)
    {

        return parent::setUsername($username);
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
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Get postalcode
     *
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    public function __construct()
    {
        parent::__construct();
      $this->events = new ArrayCollection();


    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents($events)
    {
        $this->events = $events;
    }
}