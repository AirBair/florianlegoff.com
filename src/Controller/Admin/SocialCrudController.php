<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Social;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class SocialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Social::class;
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
            TextField::new('title'),
            TextField::new('icon'),
            UrlField::new('url'),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
    }
}
