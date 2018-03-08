<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/6/2018
 * Time: 4:02 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Application;
use AppBundle\Entity\Release;
use AppBundle\Form\ReleaseFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReleaseController extends Controller
{
    /**
     * @Route("/add_release", name="add")
     */
    public function newRelease()
    {
        $form = $this->createForm(ReleaseFormType::class);
        $em = $this->getDoctrine()->getManager();

        $applicationRelease = $em->getRepository('AppBundle:Application')
            ->findAny();
        $applicationsInvolved = $em->getRepository('AppBundle:Application')
            ->findAny();
        $informedTeams = $em->getRepository('AppBundle:Team')
            ->findAny();;
        $informedUsers = $em->getRepository('AppBundle:User')
            ->findAny();

        $release = new Release();
        $release->setNameRelease('');
        $release->setDescriptionRelease('');
        $release->setApplicationRelease( $applicationRelease);
        $release->setApplicationsInvolved($applicationsInvolved);
        $release->setInformedTeams( $informedTeams);
        $release->setInformedUsers($informedUsers);

//        $em->persist($release);
//        $em->flush();


        return $this->render('release/add.html.twig', [
            'releaseForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/search_release", name="search")
     */

    public function listRelease()
    {
        return $this->render('release/search.html.twig');
    }

}