<?php
namespace FamilyTask\Entity;

use Doctrine\ORM\Mapping AS ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 *
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *          "family_list",
 *          parameters = {
 *              "id" = "expr(object.getId())"
 *          }
 *      )
 * )
 *
 * @ORM\Entity
 * @ORM\Table(name="family")
 */
class Family
{

    /**
     * @var int
     *
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}