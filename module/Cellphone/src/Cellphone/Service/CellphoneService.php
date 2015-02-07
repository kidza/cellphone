<?php

/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 7, 2015
 * @ description :
 */
namespace Cellphone\Service;

class CellphoneService {
    
    private $objectManager;
    
    public function __construct($entityManager) {
        $this->objectManager = $entityManager;
    }
    
    public function save($cellphone) {
        $this->objectManager->persist($cellphone);
        $this->objectManager->flush($cellphone);
    }
    
    public function getCellphone($phoneId) {
        $cellphone = $this->objectManager->find('\Cellphone\Entity\Cellphone', $phoneId);
        return $cellphone;
    }
    
    public function getAllPhones() {
        $phones = $this->objectManager->getRepository('\Cellphone\Entity\Cellphone')->getPhones();
        return $phones;
    }
    
    public function deleteCellphone($phoneId) {
        $cellphone = $this->objectManager->find('\Cellphone\Entity\Cellphone', $phoneId);
        $this->objectManager->remove($cellphone);
        $this->objectManager->flush();
    }
}