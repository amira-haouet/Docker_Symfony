<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Patrimony;
use App\Entity\User;
use App\Entity\Service;


use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

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
            ->setTitle('Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('User', 'fa fa-user-circle')->setSubItems([
            MenuItem::linkToCrud(' Add User', 'fa fa-plus-square', User::class)->setAction(Crud::PAGE_NEW),

            MenuItem::linkToCrud(' list User', 'fa fa-list-ul', User::class)
        ]);

        yield MenuItem::subMenu('Patrimony', 'fa fa-university')->setSubItems([
            MenuItem::linkToCrud(' Add patrimony', 'fa fa-plus-square', Patrimony::class)->setAction(Crud::PAGE_NEW),

            MenuItem::linkToCrud(' list patrimony', 'fa fa-list-ul', Patrimony::class)
        ]);

        yield MenuItem::subMenu('Service', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud(' Add Service', 'fa fa-plus-square', Service::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud(' list Service', 'fa fa-list-ul', Service::class)
        ]);
    }
}
