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
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 *
 * @UniqueEntity("titleEn")
 * @UniqueEntity("titleFr")
 *
 * @Vich\Uploadable
 */
class Project
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
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $typeEn;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $typeFr;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    private $descriptionFr;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    private $technologiesEn;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    private $technologiesFr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     *
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $realisationDate;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     * @Assert\Url()
     */
    private $url;

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
     * @Vich\UploadableField(mapping="project_image", fileNameProperty="imageName")
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
     * @return Project
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
     * @return Project
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    /**
     * Get the value of Type En
     *
     * @return string
     */
    public function getTypeEn()
    {
        return $this->typeEn;
    }

    /**
     * Set the value of Type En
     *
     * @param string $typeEn
     *
     * @return Project
     */
    public function setTypeEn($typeEn)
    {
        $this->typeEn = $typeEn;

        return $this;
    }

    /**
     * Get the value of Type Fr
     *
     * @return string
     */
    public function getTypeFr()
    {
        return $this->typeFr;
    }

    /**
     * Set the value of Type Fr
     *
     * @param string $typeFr
     *
     * @return Project
     */
    public function setTypeFr($typeFr)
    {
        $this->typeFr = $typeFr;

        return $this;
    }

    /**
     * Get the value of Description En
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set the value of Description En
     *
     * @param string $descriptionEn
     *
     * @return Project
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get the value of Description Fr
     *
     * @return string
     */
    public function getDescriptionFr()
    {
        return $this->descriptionFr;
    }

    /**
     * Set the value of Description Fr
     *
     * @param string $descriptionFr
     *
     * @return Project
     */
    public function setDescriptionFr($descriptionFr)
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    /**
     * Get the value of Technologies En
     *
     * @return string
     */
    public function getTechnologiesEn()
    {
        return $this->technologiesEn;
    }

    /**
     * Set the value of Technologies En
     *
     * @param string $technologiesEn
     *
     * @return Project
     */
    public function setTechnologiesEn($technologiesEn)
    {
        $this->technologiesEn = $technologiesEn;

        return $this;
    }

    /**
     * Get the value of Technologies Fr
     *
     * @return string
     */
    public function getTechnologiesFr()
    {
        return $this->technologiesFr;
    }

    /**
     * Set the value of Technologies Fr
     *
     * @param string $technologiesFr
     *
     * @return Project
     */
    public function setTechnologiesFr($technologiesFr)
    {
        $this->technologiesFr = $technologiesFr;

        return $this;
    }

    /**
     * Get the value of Realisation Date
     *
     * @return \DateTime
     */
    public function getRealisationDate()
    {
        return $this->realisationDate;
    }

    /**
     * Set the value of Realisation Date
     *
     * @param \DateTime $realisationDate
     *
     * @return Project
     */
    public function setRealisationDate(\DateTime $realisationDate)
    {
        $this->realisationDate = $realisationDate;

        return $this;
    }

    /**
     * Get the value of Url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of Url
     *
     * @param string $url
     *
     * @return Project
     */
    public function setUrl($url)
    {
        $this->url = $url;

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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
