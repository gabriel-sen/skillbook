<?php

namespace App\Controller\Admin;

use App\Entity\BusinessUnit;
use App\Entity\Category;
use App\Entity\Project;
use App\Entity\Role;
use App\Entity\Skill;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Skillbook - admin');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToCrud('utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Filtre par unités de business', 'fas fa-user', BusinessUnit::class);
        yield MenuItem::linkToCrud('Filtre par projet', 'fas fa-user', Project::class);
        yield MenuItem::linkToCrud('Filtre par rôles', 'fas fa-user', Role::class);
        yield MenuItem::linkToCrud('Filtre par compétences', 'fas fa-user', Skill::class);
    }
}

