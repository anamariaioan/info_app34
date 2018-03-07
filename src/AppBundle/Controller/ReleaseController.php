<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/6/2018
 * Time: 4:02 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReleaseController extends Controller
{
    /**
     * @Route("/add_release", name="add")
     */
    public function addRelease()
    {
        return $this->render('release/add.html.twig');
    }

    /**
     * @Route("/search_release", name="search")
     */

    public function searchRelease()
    {
        return $this->render('release/search.html.twig');
    }

}