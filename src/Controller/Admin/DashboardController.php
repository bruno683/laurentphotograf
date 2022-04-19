<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\Products;
use App\Entity\Tirages;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();


        $url = $this->adminUrlGenerator->setController(ProductsCrudController::class)->generateUrl();
        return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        //return $this->render('bundles/EasyAdminBundle/layout.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('LaurentPhotograf'); // the name visible to end users
    }

    public function configureMenuItems(): iterable
    {

        return [
            MenuItem::linkToDashboard('tableau de bord', 'fa fa-home'),
            MenuItem::section('Photos'),
            MenuItem::subMenu('Gestion des photos photos', 'fas-fa-bar')->setSubItems([
                MenuItem::linkToCrud('Afficher les Photos', 'fa fa-eye', Products::class),
                MenuItem::linkToCrud('Ajouter des Photos', 'fa fa-plus', Products::class)->setAction(Crud::PAGE_NEW)
            ]),
            MenuItem::section('Journal'),
            MenuItem::subMenu('tableau de bord du journal', 'fas-fa-bar')->setSubItems([
                MenuItem::linkToCrud('Liste des articles', 'fa fa-list', Post::class),
                MenuItem::linkToCrud('Créer un article', 'fa fa-pen', Post::class)->setAction(Crud::PAGE_NEW)
            ]),
            /*MenuItem::section('Tirages Limités'),
            MenuItem::subMenu('Gestions des tirages', 'fas-fa-bar')->setSubItems([
                MenuItem::linkToCrud('Listes des tirages', 'fa fa-list', Tirages::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Créer un tirage', 'fa fa-plus', Tirages::class)->setAction(Crud::PAGE_NEW)
            ]),*/
            MenuItem::section('Revenir au site'),
            MenuItem::subMenu('Sélectionner une page', 'fa fa-sitemap')->setSubItems([
                MenuItem::linkToRoute('Acceuil', 'fa fa-home', 'home'),
                MenuItem::linkToRoute('Portfolio', 'fas fa-camera-retro', 'portfolio'),
                MenuItem::linkToRoute('Journal', 'fa fa-newspaper', 'post')
            ])

        ];
    }
}
