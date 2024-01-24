<?php

namespace App\Controller;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/services', name: 'services_')]
class ServicesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServicesRepository $servicesRepository): Response
    {
        $services = $servicesRepository->findBy(['isPublished' => true]);

        return $this->render('services/index.html.twig', [
            'page_title' => 'Nos services',
            'services' => $services

        ]);
    }

    #[Route('/{slug}', name: 'view')]
    public function view(Services $service): Response
    {
        return $this->render('services/view.html.twig', [
            'page_title' => 'Nos services',
            'service' => $service
        ]);
    }
}
