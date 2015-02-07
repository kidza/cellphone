<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 7, 2015
 * @ description :
 */ 

namespace Cellphone\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Custom repository for Cellphone Entity
 *
 */
class CellphoneRepository extends EntityRepository
{
    /**
     * Returns array of cellphone objects with status == 1 ordered by manufacturer name
     * 
     * @return multitype:
     */
    public function getPhones() {
        $qb = $this->createQueryBuilder('cp');
        
        $qb->join('cp.manufacturer', 'm')
            ->where('cp.status = 1')
            ->orderBy('m.name', 'ASC');
        
        $phones = $qb->getQuery()->getResult();
        
        return $phones;
    }
}