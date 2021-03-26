<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\SkillItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SkillItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SkillItem::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['skillGroup' => 'ASC', 'position' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnDetail(),
            IntegerField::new('position'),
            AssociationField::new('skillGroup'),
            TextField::new('titleEn')->hideOnIndex(),
            TextField::new('titleFr'),
            IntegerField::new('grade'),
            TextField::new('imageFile', 'Logo')->setFormType(VichFileType::class)->onlyOnForms(),
            ImageField::new('imageName', 'Logo')->setBasePath('/images/skills')->onlyOnIndex(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
        ];
    }
}
