<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/8/2018
 * Time: 6:36 PM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Team;
use Doctrine\ORM\EntityRepository;

class TeamRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('teams')
            ->orderBy('teams.team', 'ASC')
            ;
    }

    /**
     * @return Team
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findAny()
    {
        return $this->createQueryBuilder('team')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

}