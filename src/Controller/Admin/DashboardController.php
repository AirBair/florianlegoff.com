<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Content;
use App\Entity\Message;
use App\Entity\Project;
use App\Entity\SkillGroup;
use App\Entity\SkillItem;
use App\Entity\Social;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin")
     */
    public function index(): Response
    {
        return $this->redirect($this->get(AdminUrlGenerator::class)->setController(ContentCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration')
            ->setFaviconPath('images/favicon.png')
            ->renderContentMaximized();
    }

    public function configureCrud(): Crud
    {
        return Crud::new();
    }

    public function configureActions(): Actions
    {
        $actions = parent::configureActions();

        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureMenuItems(): iterable
    {
        $submenu1 = [
            MenuItem::linkToCrud('Groups', '', SkillGroup::class),
            MenuItem::linkToCrud('Items', '', SkillItem::class),
        ];

        yield MenuItem::linktoRoute('Homepage', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Contents', 'fas fa-file-alt', Content::class);
        yield MenuItem::linkToCrud('Projects', 'fas fa-briefcase', Project::class);
        yield MenuItem::subMenu('Skills', 'fas fa-graduation-cap')->setSubItems($submenu1);
        yield MenuItem::linkToCrud('Socials', 'fas fa-share-square', Social::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope', Message::class);
    }
}
