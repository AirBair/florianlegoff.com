<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\SkillItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SkillItemRepository extends ServiceEntityRepository
{
    /**
     * Constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SkillItem::class);
    }
}
