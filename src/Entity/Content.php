<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
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
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $contentEn;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $contentFr;


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
}
