<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/6/2018
 * Time: 4:02 PM
 */

namespace AppBundle\Controller;

use AppBundle\Form\ReleaseFormType;
use AppBundle\Service\ReleaseService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReleaseController extends Controller
{
    /**
     * @Route("/add_release", name="add")
     */
    public function newReleaseAction(Request $request, ReleaseService $releaseService)
    {
        $form = $this->createForm(ReleaseFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $releaseService->saveNewRelease($form->getData());
        }

        return $this->render('release/add.html.twig', [
            'releaseForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/add_release/inform", name="inform")
     */
    public function informOthers(Request $request)
    {
        $form = $this->createForm(ReleaseFormType::class);

        $form->handleRequest($request);

        return $this->render('release/inform.html.twig', [
            'informForm' => $form->createView()
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