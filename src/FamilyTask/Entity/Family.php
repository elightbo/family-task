<?php
namespace FamilyTask\Entity;

/**
 * The family class
 * @Entity
 */
class Family
{
    
    /**
     * @var int
     * @Id @Column(type="integer") @GeneratedValued
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string")
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