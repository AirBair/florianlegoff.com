<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillGroupRepository")
 *
 * @UniqueEntity("titleEn")
 * @UniqueEntity("titleFr")
 */
class SkillGroup
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
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank
     * @Assert\Type("integer")
     * @Assert\GreaterThan(0)
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SkillItem", mappedBy="skillGroup", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     * @Assert\Collection
     */
    private $skillItems;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->skillItems = new ArrayCollection();
    }

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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

    /**
     * @return Collection|SkillItem[]
     */
    public function getSkillItems(): Collection
    {
        return $this->skillItems;
    }

    public function addSkillItem(SkillItem $skillItem): self
    {
        if (!$this->skillItems->contains($skillItem)) {
            $this->skillItems[] = $skillItem;
            $skillItem->setSkillGroup($this);
        }

        return $this;
    }

    public function removeSkillItem(SkillItem $skillItem): self
    {
        if ($this->skillItems->contains($skillItem)) {
            $this->skillItems->removeElement($skillItem);
            if ($skillItem->getSkillGroup() === $this) {
                $skillItem->setSkillGroup(null);
            }
        }

        return $this;
    }
}
