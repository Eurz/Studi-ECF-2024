<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'home_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServicesRepository $servicesRepository): Response
    {

        $services = $servicesRepository->findBy(['isPublished' => true], null, 3);

        return $this->render('home/index.html.twig', [
            'page_title' => 'Garage V. Parrot',
            'services' => $services
        ]);
    }
}
