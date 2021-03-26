<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Content;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Content::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['label' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('label'),
            TextareaField::new('contentEn'),
            TextareaField::new('contentFr'),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
    }
}
