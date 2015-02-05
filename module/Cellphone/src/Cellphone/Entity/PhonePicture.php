<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 5, 2015
 * @ description : 
 */

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
	 * @ORM\ManyToOne(targetEntity="Entity\Cellphone", inversedBy="pictures")
	 * 
	 */
	protected $phone;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $filename;
}