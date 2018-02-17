<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillItemRepository")
 *
 * @UniqueEntity("titleEn")
 * @UniqueEntity("titleFr")
 *
 * @Vich\Uploadable
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
     *
     * @Assert\NotNull()
     * @Assert\Valid()
     */
    private $skillGroup;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank()
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank()
     */
    private $titleFr;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\Type("integer")
     * @Assert\Range(min=1, max=5)
     */
    private $grade;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\Type("integer")
     * @Assert\GreaterThan(0)
     */
    private $position;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="skill_image", fileNameProperty="imageName")
     *
     * @Assert\Image()
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     *
     * @Assert\DateTime()
     */
    private $updatedAt;


    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->titleEn;
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

    /**
     * Get the value of Image File
     *
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of Image File
     *
     * @param File $imageFile
     *
     * @return SkillItem
     */
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * Get the value of Image Name
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of Image Name
     *
     * @param string $imageName
     *
     * @return SkillItem
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

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
     * @param \DateTime $updatedAt
     *
     * @return SkillItem
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get slug representation for vich uploader namer
     *
     * @return string
     */
    public function getSlug()
    {
        $slugify = new Slugify();

        return $slugify->slugify($this->titleEn);
    }
}
