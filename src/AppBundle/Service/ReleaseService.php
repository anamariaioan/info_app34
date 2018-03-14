<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/12/2018
 * Time: 1:12 PM
 */

namespace AppBundle\Service;

use AppBundle\Repository\ApplicationRepository;
use AppBundle\Entity\Application;
use AppBundle\Entity\Release;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;

class ReleaseService
{
    /** @var EntityManager */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function saveNewRelease($data)
    {

//        /** @var ApplicationRepository $applicationReleaseRepository */
//        $applicationReleaseRepository = $this->entityManager->getRepository('AppBundle:Application');
//        $applicationRelease = $applicationReleaseRepository->findAny();
//        $applicationsInvolved = $this->getRepository('AppBundle:Application')
//            ->findAny();
//        $informedTeams = $em->getRepository('AppBundle:Team')
//            ->findAny();
//        $informedUsers = $em->getRepository('AppBundle:User')
//            ->findAny();

//        dump($data);die;

//        $release = new Release();
//        $release->setNameRelease($data['nameRelease']);
//        $release->setDescriptionRelease($data['descriptionRelease']);
//        $release->setApplicationRelease($data['applicationRelease']);
//        $release->setApplicationsInvolved($data['applicationsInvolved']);
//        $release->setInformedTeams($data['informedTeams']);
//        $release->setInformedUsers($data['informedUsers']);

//        dump($release);die;
$data->setInformedTeams($data->getInformedTeams()->getId()); 
       $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

}
