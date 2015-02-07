<?php

namespace Cellphone\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\Cellphone\Repository\CellphoneRepository") 
 */
class Cellphone {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="PhoneManufacturer")
	 */
	protected $manufacturer;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $model;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $status;
	
	/**
	 * @ORM\Column(type="float")
	 */
	protected $weight;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $memory;
	
	/**
	 * @ORM\Column(type="float")
	 */
	protected $size;
	
	/**
     * @ORM\OneToMany(targetEntity="PhonePicture", mappedBy="cellphone")
     */
	protected $pictures;
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set name
	 *
	 * @param string $name        	
	 * @return Cellphone
	 */
	public function setName($name) {
		$this->name = $name;
		
		return $this;
	}
	
	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Set description
	 *
	 * @param string $description        	
	 * @return Cellphone
	 */
	public function setDescription($description) {
		$this->description = $description;
		
		return $this;
	}
	
	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Set status
	 *
	 * @param boolean $status        	
	 * @return Cellphone
	 */
	public function setStatus($status) {
		$this->status = $status;
		
		return $this;
	}
	
	/**
	 * Get status
	 *
	 * @return boolean
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * Set weight
	 *
	 * @param float $weight        	
	 * @return Cellphone
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
		
		return $this;
	}
	
	/**
	 * Get weight
	 *
	 * @return float
	 */
	public function getWeight() {
		return $this->weight;
	}
	
	/**
	 * Set memory
	 *
	 * @param integer $memory        	
	 * @return Cellphone
	 */
	public function setMemory($memory) {
		$this->memory = $memory;
		
		return $this;
	}
	
	/**
	 * Get memory
	 *
	 * @return integer
	 */
	public function getMemory() {
		return $this->memory;
	}
	
	/**
	 * Set size
	 *
	 * @param float $size        	
	 * @return Cellphone
	 */
	public function setSize($size) {
		$this->size = $size;
		
		return $this;
	}
	
	/**
	 * Get size
	 *
	 * @return float
	 */
	public function getSize() {
		return $this->size;
	}
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Cellphone
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set manufacturer
     *
     * @param \Cellphone\Entity\PhoneManufacturer $manufacturer
     * @return Cellphone
     */
    public function setManufacturer(\Cellphone\Entity\PhoneManufacturer $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return \Cellphone\Entity\PhoneManufacturer 
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Add pictures
     *
     * @param \Cellphone\Entity\PhonePicture $pictures
     * @return Cellphone
     */
    public function addPicture(\Cellphone\Entity\PhonePicture $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \Cellphone\Entity\PhonePicture $pictures
     */
    public function removePicture(\Cellphone\Entity\PhonePicture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}
