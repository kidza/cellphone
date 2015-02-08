<?php

/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 7, 2015
 * @ description : Service class for cellphone entity. Injected in IndexController, 
 * provides service methods for cellphone entity and keeps object manager away of controller.
 */
namespace Cellphone\Service;

class CellphoneService
{

    private $objectManager;

    public function __construct($entityManager)
    {
        $this->objectManager = $entityManager;
    }

    /**
     * Persists and save phone to db
     * 
     * @param Cellphone\Entity\Cellphone $cellphone
     */
    public function save($cellphone)
    {
        $this->objectManager->persist($cellphone);
        $this->objectManager->flush($cellphone);
    }

    /**
     * Finds and returns cellphone according to parameter $phoneId
     * 
     * @param integer $phoneId
     * @return \Cellphone\Entity\Cellphone
     */
    public function getCellphone($phoneId)
    {
        $cellphone = $this->objectManager->find('\Cellphone\Entity\Cellphone', $phoneId);
        return $cellphone;
    }

    /**
     * Gets all active cellphones
     * 
     * @return array of \Cellphone\Entity\Cellphone
     */
    public function getAllPhones()
    {
        $phones = $this->objectManager->getRepository('\Cellphone\Entity\Cellphone')->getPhones();
        return $phones;
    }

    /**
     * Delete cellphone with id = $phoneId
     * 
     * @param integer $phoneId
     */
    public function deleteCellphone($phoneId)
    {
        $cellphone = $this->objectManager->find('\Cellphone\Entity\Cellphone', $phoneId);
        $this->objectManager->remove($cellphone);
        $this->objectManager->flush();
    }
}