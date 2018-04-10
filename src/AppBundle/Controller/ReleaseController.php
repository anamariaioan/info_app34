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
            $releaseId = $releaseService->saveNewRelease($form->getData());

            return $this->redirectToRoute('release_saved', [
                'releaseId' => $releaseId
            ]);
        }

        return $this->render('release/add.html.twig', [
            'releaseForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/add_release/release_saved/{releaseId}", name="release_saved")
     * @param int $releaseId
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function releaseSavedAction(int $releaseId, Request $request)
    {
        return $this->render('release/release_saved.html.twig', [
            'releaseId' => $releaseId
        ]);

    }
}
