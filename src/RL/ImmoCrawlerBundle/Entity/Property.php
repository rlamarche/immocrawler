<?php

namespace RL\ImmoCrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Property
 */
class Property
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $area;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $rooms;

    /**
     * @var string
     */
    private $energyClass;

    /**
     * @var string
     */
    private $ges;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $zipcode;

    /**
     * @var string
     */
    private $street;


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
     * Set title
     *
     * @param string $title
     * @return Property
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Property
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set area
     *
     * @param integer $area
     * @return Property
     */
    public function setArea($area)
    {
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Property
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Property
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set rooms
     *
     * @param integer $rooms
     * @return Property
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    
        return $this;
    }

    /**
     * Get rooms
     *
     * @return integer 
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set energyClass
     *
     * @param string $energyClass
     * @return Property
     */
    public function setEnergyClass($energyClass)
    {
        $this->energyClass = $energyClass;
    
        return $this;
    }

    /**
     * Get energyClass
     *
     * @return string 
     */
    public function getEnergyClass()
    {
        return $this->energyClass;
    }

    /**
     * Set ges
     *
     * @param string $ges
     * @return Property
     */
    public function setGes($ges)
    {
        $this->ges = $ges;
    
        return $this;
    }

    /**
     * Get ges
     *
     * @return string 
     */
    public function getGes()
    {
        return $this->ges;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Property
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
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
     * Set zipcode
     *
     * @param string $zipcode
     * @return Property
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    
        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Property
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
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
}
