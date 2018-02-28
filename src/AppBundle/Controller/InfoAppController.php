<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 2/2/2018
 * Time: 11:37 AM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoAppController extends Controller
{
    /**
     * @Route("/home", name="homepage")
     */
    public function showAction()
    {
        return $this->render('home/show.html.twig');
    }

}