<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/7/2018
 * Time: 1:39 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="releases")
 */
class Release
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="title")
     */
    private $nameRelease;

    /**
     * @ORM\Column(type="string", name="description")
     */
    private $descriptionRelease;

    /**
     * @ORM\Column(type="integer", name="application")
     * @ORM\ManyToOne(targetEntity="Application")
     */
    private $applicationRelease;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->applicationRelease = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getNameRelease()
    {
        return $this->nameRelease;
    }

    /**
     * @param mixed $nameRelease
     */
    public function setNameRelease($nameRelease)
    {
        $this->nameRelease = $nameRelease;
    }

    /**
     * @return mixed
     */
    public function getDescriptionRelease()
    {
        return $this->descriptionRelease;
    }

    /**
     * @param mixed $descriptionRelease
     */
    public function setDescriptionRelease($descriptionRelease)
    {
        $this->descriptionRelease = $descriptionRelease;
    }

    /**
     * @return mixed
     */
    public function getApplicationRelease()
    {
        return $this->applicationRelease;
    }

    /**
     * @param mixed $applicationRelease
     */
    public function setApplicationRelease($application)
    {
        $this->applicationRelease = $application;
    }

}
