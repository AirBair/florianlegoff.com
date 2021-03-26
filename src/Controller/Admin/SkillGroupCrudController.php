<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\SkillGroup;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SkillGroupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SkillGroup::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['position' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnDetail(),
            IntegerField::new('position'),
            TextField::new('titleEn'),
            TextField::new('titleFr'),
            AssociationField::new('skillItems')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
    }
}
