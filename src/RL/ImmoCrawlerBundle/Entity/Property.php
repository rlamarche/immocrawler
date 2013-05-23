<?php

namespace RL\ImmoCrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Property
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RL\ImmoCrawlerBundle\Entity\PropertyRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Property
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     * 
     * @ORM\Column(name="provider_type", type="string", length=255)
     */
    private $providerType;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="provider_id", type="string", length=255)
     */
    private $providerId;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="provider_url", type="string", length=255)
     */
    private $providerUrl;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="area", type="smallint")
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="rooms", type="smallint")
     */
    private $rooms;

    /**
     * @var string
     *
     * @ORM\Column(name="energy_class", type="string", length=255, nullable=true)
     */
    private $energyClass;

    /**
     * @var string
     *
     * @ORM\Column(name="pollution_class", type="string", length=255, nullable=true)
     */
    private $pollutionClass;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Property
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Property
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * Set pollutionClass
     *
     * @param string $pollutionClass
     * @return Property
     */
    public function setPollutionClass($pollutionClass)
    {
        $this->pollutionClass = $pollutionClass;
    
        return $this;
    }

    /**
     * Get pollutionClass
     *
     * @return string 
     */
    public function getPollutionClass()
    {
        return $this->pollutionClass;
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

    /**
     * Set providerType
     *
     * @param string $providerType
     * @return Property
     */
    public function setProviderType($providerType)
    {
        $this->providerType = $providerType;

        return $this;
    }

    /**
     * Get providerType
     *
     * @return string 
     */
    public function getProviderType()
    {
        return $this->providerType;
    }

    /**
     * Set providerId
     *
     * @param string $providerId
     * @return Property
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;

        return $this;
    }

    /**
     * Get providerId
     *
     * @return string 
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * Set providerUrl
     *
     * @param string $providerUrl
     * @return Property
     */
    public function setProviderUrl($providerUrl)
    {
        $this->providerUrl = $providerUrl;

        return $this;
    }

    /**
     * Get providerUrl
     *
     * @return string 
     */
    public function getProviderUrl()
    {
        return $this->providerUrl;
    }
    
    
    /**
     * Now we tell doctrine that before we persist or update we call the updatedTimestamps() function.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateTimestamps()
    {
        $this->setUpdatedAt(new \DateTime());

        if($this->getCreatedAt() == null)
        {
            $this->setCreatedAt(new \DateTime());
        }
    }
}
