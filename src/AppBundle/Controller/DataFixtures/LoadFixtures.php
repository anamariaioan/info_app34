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

class LoadFixtures implements ORMFixtureInterface
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUserName('BA'.rand(1, 5));
        $user->setUserName('tll'.rand(1, 5));
        $user->setUserName('dev'.rand(1,10));
        $user->setUserName('qa'.rand(1,5));
        $user->setEmail('userName'.rand(1, 50).'@emag.ro');

        $manager->persist($user);
        $manager->flush();
    }
}