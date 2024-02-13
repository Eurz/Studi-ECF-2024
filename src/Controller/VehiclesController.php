<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Form\SearchType;
use App\Model\SearchDTO;
use App\Repository\VehiclesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

#[Route('/vehicles', name: 'vehicles_')]
class VehiclesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(

        Request $request,
        VehiclesRepository $vehiclesRepository,
        FormFactoryInterface $formFactory
    ): Response {
        $formSearch = $formFactory->createNamed('', SearchType::class, null, [
            'method' => 'POST'
        ]);

        return $this->render('vehicles/index.html.twig', [
            'pageTitle' => 'Véhicules d\'occasions',
            'vehicles' => $vehiclesRepository->findAll(),
            'formSearch' => $formSearch
        ]);
    }

    #[Route('/{id}/view', name: 'view')]
    public function view(Vehicle $vehicle): Response
    {

        return $this->render('vehicles/view.html.twig', [
            'vehicle' => $vehicle
        ]);
    }

    #[Route('/filter', name: 'filter')]
    public function filteredVehicles(
        Request $request,
        VehiclesRepository $vehiclesRepository
    ) {

        $payload = $request->getPayload();

        $filters = [];
        foreach ($payload as $key => $value) {
            $filters[$key] = $value;
        }
        $vehicles = $vehiclesRepository->findVehiclesFiltered($filters);

        return $this->json($vehicles);
    }
}
