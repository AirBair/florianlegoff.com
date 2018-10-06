<?php

declare(strict_types=1);

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
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank
     */
    private $titleEn;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank
     */
    private $titleFr;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     */
    private $typeEn;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     */
    private $typeFr;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank
     */
    private $descriptionEn;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank
     */
    private $descriptionFr;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank
     */
    private $technologiesEn;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank
     */
    private $technologiesFr;

    /**
     * @ORM\Column(type="date")
     *
     * @Assert\NotBlank
     * @Assert\Date
     */
    private $realisationDate;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank
     * @Assert\Type("integer")
     * @Assert\GreaterThan(0)
     */
    private $position;

    /**
     * @Vich\UploadableField(mapping="project_image", fileNameProperty="imageName")
     *
     * @Assert\Image
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    public function __toString(): string
    {
        return (string) $this->titleEn;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleEn(): ?string
    {
        return $this->titleEn;
    }

    public function setTitleEn(string $titleEn): self
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    public function getTitleFr(): ?string
    {
        return $this->titleFr;
    }

    public function setTitleFr(string $titleFr): self
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    public function getTypeEn(): ?string
    {
        return $this->typeEn;
    }

    public function setTypeEn(string $typeEn): self
    {
        $this->typeEn = $typeEn;

        return $this;
    }

    public function getTypeFr(): ?string
    {
        return $this->typeFr;
    }

    public function setTypeFr(string $typeFr): self
    {
        $this->typeFr = $typeFr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(string $descriptionFr): self
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    public function getTechnologiesEn(): ?string
    {
        return $this->technologiesEn;
    }

    public function setTechnologiesEn(string $technologiesEn): self
    {
        $this->technologiesEn = $technologiesEn;

        return $this;
    }

    public function getTechnologiesFr(): ?string
    {
        return $this->technologiesFr;
    }

    public function setTechnologiesFr(string $technologiesFr): self
    {
        $this->technologiesFr = $technologiesFr;

        return $this;
    }

    public function getRealisationDate(): ?\DateTimeInterface
    {
        return $this->realisationDate;
    }

    public function setRealisationDate(\DateTimeInterface $realisationDate): self
    {
        $this->realisationDate = $realisationDate;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(File $imageFile): self
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * Get slug representation for vich uploader namer.
     */
    public function getSlug(): ?string
    {
        $slugify = new Slugify();

        return $slugify->slugify($this->titleEn);
    }
}
