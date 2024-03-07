<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Family;
use App\Entity\Origin;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('BACK_OFFICE_ACCESS')]
    public function index(): Response
    {
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(AnimalCrudController::class)->generateUrl());

        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Weirdmals');
    }

    
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Animaux', 'fas fa-list', Animal::class);
        yield MenuItem::linkToCrud('Origines', 'fas fa-list', Origin::class);
        yield MenuItem::linkToCrud('Familles', 'fas fa-list', Family::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);


    }
}
