<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillGroupRepository")
 */
class SkillGroup
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
    private $position;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\SkillItem", mappedBy="skillGroup", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $skillItems;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skillItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return SkillGroup
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
     * @return SkillGroup
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;

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
     * @return SkillGroup
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of Skill Items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkillItems()
    {
        return $this->skillItems;
    }

    /**
     * Set the value of Skill Items
     *
     * @param \Doctrine\Common\Collections\Collection $skillItems
     *
     * @return SkillGroup
     */
    public function setSkillItems(\Doctrine\Common\Collections\Collection $skillItems)
    {
        $this->skillItems = $skillItems;

        return $this;
    }

    /**
     * Add a Skill Items
     *
     * @param \App\Entity\SkillItem $skillItem
     *
     * @return SkillGroup
     */
    public function addSkillItem(\App\Entity\SkillItem $skillItem)
    {
        $this->skillItem->add($skillItem);

        $skillItem->setSkillGroup($this);

        return $this;
    }

    /**
     * Remove a Skill Items
     *
     * @param \App\Entity\SkillItem $skillItem
     *
     * @return SkillGroup
     */
    public function removeSkillItem(\App\Entity\SkillItem $skillItem)
    {
        $this->skillItem->removeElement($skillItem);

        return $this;
    }

    /**
     * Get the value of Updated At
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of Updated At
     *
     * @param \DateTime updatedAt
     *
     * @return SkillGroup
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}