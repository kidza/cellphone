<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 5, 2015
 * @ description : 
 */

namespace Cellphone\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PhonePicture {
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Cellphone", inversedBy="pictures")
	 * 
	 */
	protected $cellphone;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $filename;

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
     * Set filename
     *
     * @param string $filename
     * @return PhonePicture
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set cellphone
     *
     * @param \Cellphone\Entity\Cellphone $cellphone
     * @return PhonePicture
     */
    public function setCellphone(\Cellphone\Entity\Cellphone $cellphone = null)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return \Cellphone\Entity\Cellphone 
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }
}
