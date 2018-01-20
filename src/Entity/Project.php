<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
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
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $typeEn;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $typeFr;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $descriptionFr;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $technologiesEn;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $technologiesFr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $realisationDate;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $url;

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
}
