<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/31/2018
 * Time: 7:16 PM
 */

namespace AppBundle\Service;

use AppBundle\Entity\Application;
use AppBundle\Entity\ApplicationsInvolved;
use AppBundle\Entity\InformedTeams;
use AppBundle\Entity\InformedUsers;
use AppBundle\Entity\Team;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class InformOthersService
{
    /** @var EntityManager */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager  = $entityManager;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveInformedOthersDetails($releaseId, $data)
    {

        /** @var Application $applicationInvolved */
        foreach ($data['applicationsInvolved'] as $applicationInvolved) {
            $newApplicationInvolved = new ApplicationsInvolved();
            $newApplicationInvolved->setIdRelease($releaseId)
                ->setIdApplication($applicationInvolved->getId());

            $this->entityManager->persist($newApplicationInvolved);
        }

        /** @var Team $informedTeam */
        foreach ($data['informedTeams'] as $informedTeam){
            $newInformedTeam = new InformedTeams();
            $newInformedTeam->setIdRelease($releaseId)
                ->setIdTeam($informedTeam->getId());

            $this->entityManager->persist($newInformedTeam);
        }

        /** @var User $informedUser */
        foreach ($data['informedUsers'] as $informedUser){
            $newInformedUsers = new InformedUsers();
            $newInformedUsers->setIdRelease($releaseId)
                ->setIdUser($informedUser->getId());

            $this->entityManager->persist($newInformedUsers);
        }



        $this->entityManager->flush();
    }
}