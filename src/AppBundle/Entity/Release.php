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
 * @ORM\Table(name="release")
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
     * @ORM\Column(type="string", name="name_release")
     */
    private $nameRelease;

    /**
     * @ORM\Column(type="string", name="description_release")
     */
    private $descriptionRelease;

    /**
     * @ORM\Column(type="integer", name="application_release")
     * @ORM\ManyToOne(targetEntity="Application")
     */
    private $applicationRelease;

    /**
     * @ORM\Column(type="integer", name="applications_involved")
     * @ORM\OneToMany(targetEntity="Application")
     */
    private $applicationsInvolved;

    /**
     * @ORM\Column(type="integer", name="informed_teams")
     * @ORM\OneToMany(targetEntity="Team")
     */
    private $informedTeams;

    /**
     * @ORM\Column(type="integer", name="informed_users")
     * @ORM\OneToMany(targetEntity="User")
     */
    private $informedUsers;

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

    /**
     * @return mixed
     */
    public function getApplicationsInvolved()
    {
        return $this->applicationsInvolved;
    }

    /**
     * @param mixed $applicationsInvolved
     */
    public function setApplicationsInvolved($application)
    {
        $this->applicationsInvolved = $application;
    }

    /**
     * @return mixed
     */
    public function getInformedTeams()
    {
        return $this->informedTeams;
    }

    /**
     * @param mixed $informedTeams
     */
    public function setInformedTeams($team)
    {
        $this->informedTeams = $team;
    }

    /**
     * @return mixed
     */
    public function getInformedUsers()
    {
        return $this->informedUsers;
    }

    /**
     * @param mixed $informedUsers
     */
    public function setInformedUsers($user)
    {
        $this->informedUsers = $user;
    }

}