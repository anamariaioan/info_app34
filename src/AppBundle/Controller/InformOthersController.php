<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 4/1/2018
 * Time: 5:03 PM
 */

namespace AppBundle\Controller;

use AppBundle\Form\InformFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\InformOthersService;

class InformOthersController extends Controller
{
    /**
     * @Route("/add_release/inform/{releaseId}", name="inform")
     */
    public function informOthers(Request $request, ReleaseController $releaseController)
    {
        /** @var InformOthersService $informedOthersService */
        $informedOthersService = $this->container->get(InformOthersService::class);
        $form = $this->createForm(InformFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $valoaredepeget = $request->attributes->get('releaseId');

            $informedOthersService->saveInformedOthersDetails($valoaredepeget, $form->getData());
        }

        return $this->render('release/inform.html.twig', [
            'informForm' => $form->createView()
        ]);

    }


}