<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/14/2018
 * Time: 5:01 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="applications_involved")
 */
class ApplicationsInvolved
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="id_release")
     * @ORM\ManyToOne(targetEntity="Release", inversedBy = "id")
     */
    private $idRelease;

    /**
     * @ORM\Column(type="integer", name="id_application")
     */
    private $idApplication;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdRelease()
    {
        return $this->idRelease;
    }

    /**
     * @param mixed $idRelease
     */
    public function setIdRelease($idRelease)
    {
        $this->idRelease = $idRelease;
    }

    /**
     * @return mixed
     */
    public function getIdApplication()
    {
        return $this->idApplication;
    }

    /**
     * @param mixed $idApplication
     */
    public function setIdApplication($idApplication)
    {
        $this->idApplication = $idApplication;
    }



}