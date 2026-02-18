<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class AdminController extends AbstractDashboardController
{
    public function index(): Response
    {
        // Redirige vers la page de gestion des utilisateurs par défaut
        return $this->redirectToRoute('admin_user_index');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Conciergerie');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-user', \App\Entity\User::class);
        yield MenuItem::linkToCrud('Partners', 'fas fa-handshake', \App\Entity\Partner::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-concierge-bell', \App\Entity\Service::class);
        yield MenuItem::linkToCrud('Reservations', 'fas fa-calendar-check', \App\Entity\Reservation::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope', \App\Entity\Message::class);
        yield MenuItem::linkToCrud('Notifications', 'fas fa-bell', \App\Entity\Notification::class);
    }
}
