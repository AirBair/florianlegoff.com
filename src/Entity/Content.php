<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 *
 * @UniqueEntity("label")
 */
class Content
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
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    private $contentEn;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    private $contentFr;

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
        return (string) $this->label;
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
     * Get the value of Label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of Label
     *
     * @param string $label
     *
     * @return Content
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of Content En
     *
     * @return string
     */
    public function getContentEn()
    {
        return $this->contentEn;
    }

    /**
     * Set the value of Content En
     *
     * @param string $contentEn
     *
     * @return Content
     */
    public function setContentEn($contentEn)
    {
        $this->contentEn = $contentEn;

        return $this;
    }

    /**
     * Get the value of Content Fr
     *
     * @return string
     */
    public function getContentFr()
    {
        return $this->contentFr;
    }

    /**
     * Set the value of Content Fr
     *
     * @param string $contentFr
     *
     * @return Content
     */
    public function setContentFr($contentFr)
    {
        $this->contentFr = $contentFr;

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
     * @return Content
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
