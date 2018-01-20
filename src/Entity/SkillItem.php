<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillItemRepository")
 */
class SkillItem
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \App\Entity\SkillGroup
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\SkillGroup", inversedBy="skillItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skillGroup;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $titleFr;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $grade;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $position;


    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Skill Group
     *
     * @return \App\Entity\SkillGroup
     */
    public function getSkillGroup()
    {
        return $this->skillGroup;
    }

    /**
     * Set the value of Skill Group
     *
     * @param \App\Entity\SkillGroup $skillGroup
     *
     * @return SkillItem
     */
    public function setSkillGroup(\App\Entity\SkillGroup $skillGroup)
    {
        $this->skillGroup = $skillGroup;

        return $this;
    }

    /**
     * Get the value of Title En
     *
     * @return string
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }

    /**
     * Set the value of Title En
     *
     * @param string $titleEn
     *
     * @return SkillItem
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    /**
     * Get the value of Title Fr
     *
     * @return string
     */
    public function getTitleFr()
    {
        return $this->titleFr;
    }

    /**
     * Set the value of Title Fr
     *
     * @param string $titleFr
     *
     * @return SkillItem
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    /**
     * Get the value of Grade
     *
     * @return int
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of Grade
     *
     * @param int $grade
     *
     * @return SkillItem
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get the value of Position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of Position
     *
     * @param int $position
     *
     * @return SkillItem
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
}
