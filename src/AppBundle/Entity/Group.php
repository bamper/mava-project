<?php
/**
 * Created by PhpStorm.
 * User: Soolan
 * Date: 19/03/16
 * Time: 11:03 AM
 */

namespace AppBundle\Entity;
use Sonata\UserBundle\Entity\BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 * @ORM\Table(name="mava_group")
 * @ORM\Entity
 */
class Group extends BaseGroup
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     * @return  integer
     */
    public function getId()
    {
        return $this->id;
    }
}