<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
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
            TextField::new('titleEn')->hideOnIndex(),
            TextField::new('titleFr'),
            TextField::new('typeEn')->hideOnIndex(),
            TextField::new('typeFr'),
            TextField::new('imageFile')->setFormType(VichFileType::class)->onlyOnForms(),
            ImageField::new('imageName', 'Image')->setBasePath('/images/projects')->onlyOnIndex(),
            TextareaField::new('descriptionEn')->hideOnIndex(),
            TextareaField::new('descriptionFr')->hideOnIndex(),
            TextareaField::new('technologiesEn')->hideOnIndex(),
            TextareaField::new('technologiesFr')->hideOnIndex(),
            DateField::new('realisationDate'),
            UrlField::new('url'),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
    }
}
