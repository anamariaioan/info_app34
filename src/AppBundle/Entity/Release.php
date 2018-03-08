<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/7/2018
 * Time: 1:39 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="release")
 */
class Release
{
    private $id;

    private $name;

    private $description;



}