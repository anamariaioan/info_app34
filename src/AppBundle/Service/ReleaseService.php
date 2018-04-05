<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/12/2018
 * Time: 1:12 PM
 */

namespace AppBundle\Service;


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

        $data->setApplicationRelease($data->getApplicationRelease()->getId());


        $this->entityManager->persist($data);
        $this->entityManager->flush();

        return $data->getId();

    }

}