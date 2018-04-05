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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="informed_users")
 */
class InformedUsers
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
     * @ORM\Column(type="integer", name="id_user")
     */
    private $idUser;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdRelease()
    {
        return $this->idRelease;
    }

    /**
     * @param int $idRelease
     *
     * @return $this
     */
    public function setIdRelease($idRelease)
    {
        $this->idRelease = $idRelease;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

}
