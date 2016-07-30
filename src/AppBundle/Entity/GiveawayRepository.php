<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GiveawayRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GiveawayRepository extends EntityRepository
{
    /**
     * To search giveaways depend upon roles
     *
     * @param $name
     * @return array
     */
    public function getGiveaways($name, $role, $sortType) {

        $qb = $this->createQueryBuilder('g');
        $qb = $qb
            ->where('g.name like :name')
            ->andWhere('g.adminOnly IN (:role)')
            ->setParameter('name', '%'.$name.'%')
            ->setParameter('role', $role )
            ->orderBy('g.price ', ($sortType == 0) ? 'asc' : 'desc')
            ;

        return $qb->getQuery()->getResult();
    }
}
