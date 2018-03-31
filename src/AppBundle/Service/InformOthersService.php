<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/31/2018
 * Time: 7:16 PM
 */

namespace AppBundle\Service;

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

    public function saveInformedOthersDetails($data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}