<?php

namespace App\Controller\Admin;

use App\Entity\Vehicle;
use App\Form\VehiclesType;
use App\Repository\VehiclesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/vehicles', name: 'admin_vehicles_')]
class VehiclesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(VehiclesRepository $vehiclesRepository): Response
    {

        $vehicles = $vehiclesRepository->findAll();
        return $this->render('admin/vehicles/index.html.twig', [
            'page_title' => 'Vos véhicules d\'occasion',
            'vehicles' => $vehicles
        ]);
    }


    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $vehicle = new Vehicle();
        $form = $this->createForm(VehiclesType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vehicle);
            $entityManager->flush();
            $this->addFlash('success', 'Véhicule bien enregistré');

            return $this->redirectToRoute('admin_vehicles_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render('admin/vehicles/new.html.twig', [
            'page_title' => 'Ajouter un nouveau véhicule',
            'form' => $form
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, Vehicle $vehicle): Response
    {

        $form = $this->createForm(VehiclesType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($vehicle);
            $entityManager->flush();

            return $this->redirectToRoute('admin_vehicles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/vehicles/edit.html.twig', [
            'page_title' => 'Editer un véhicule',
            'form' => $form
        ]);
    }
}
