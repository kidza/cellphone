<?php

namespace Cellphone\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Cellphone {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $name;
	
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
     * @ORM\OneToMany(targetEntity="Entity\PhonePicture", mappedBy="cellphone")
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
}
