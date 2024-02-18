<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServicesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin', name: 'admin_home_')]
#[IsGranted('ROLE_USER')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServicesRepository $servicesRepository): Response
    {
        return $this->render('admin/home/index.html.twig', [
            'services' => $servicesRepository->findAll(),
        ]);
    }
}
