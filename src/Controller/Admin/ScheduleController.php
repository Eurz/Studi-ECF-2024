<?php

namespace App\Controller\Admin;

use App\Entity\Schedule;
use App\Form\SchedulesFormType;
use App\Form\SchedulesType;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/schedule', name: 'admin_schedules_')]
class ScheduleController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, EntityManagerInterface $entityManager, ScheduleRepository $scheduleRepository): Response
    {
        $data = $scheduleRepository->findAll();
        $form = $this->createForm(
            SchedulesFormType::class,
            // $data,
            // [
            //     'action' => $this->generateUrl('target_route'),
            //     'method' => 'POST',
            // ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($form);
            foreach ($form->getData() as $data) {
                $entityManager->persist($data);
            }
            $entityManager->flush();

            return $this->redirectToRoute('admin_schedules_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('admin/schedules/index.html.twig', [
            'pageTitle' => 'Vos horaires',
            'form' => $form,
        ]);
    }
}
