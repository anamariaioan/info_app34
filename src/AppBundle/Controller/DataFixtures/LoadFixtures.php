<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 2/26/2018
 * Time: 9:04 PM
 */

namespace AppBundle\Controller\DataFixtures;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class LoadFixtures implements ORMFixtureInterface
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $loader = new NativeLoader();
        $objectSet = $loader->loadFile(__DIR__ . '/fixtures.yml')->getObjects();
        foreach ($objectSet as $object) {
            $manager->persist($object);
            $manager->flush();
        }
    }
}