<?php

namespace App\Controller\Admin;

use App\Entity\Testimonial;
use App\Form\TestimonialsType;
use App\Repository\TestimonialsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/testimonials', name: 'admin_testimonials_')]
class TestimonialsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(TestimonialsRepository $testimonialsRepository): Response
    {
        $testimonials = $testimonialsRepository->findBy([], ['createdAt' => 'DESC'],);
        return $this->render('admin/testimonials/index.html.twig', [
            'pageTitle' => 'Vos témoignages',
            'testimonials' => $testimonials
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $testimonial = new Testimonial();
        $form = $this->createForm(TestimonialsType::class, $testimonial, ['isAdmin' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($testimonial);
            $entityManager->flush();
            $this->addFlash('success', 'Témoignage bien enregistré');

            return $this->redirectToRoute('admin_testimonials_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render('admin/testimonials/new.html.twig', [
            'page_title' => 'Ajouter un nouveau véhicule',
            'form' => $form,
            'testimonial' => $testimonial
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, Testimonial $testimonial): Response
    {

        $form = $this->createForm(TestimonialsType::class, $testimonial, ['isAdmin' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_testimonials_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/testimonials/edit.html.twig', [
            'pageTitle' => 'Editer un témoignage',
            'testimonial' => $testimonial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Testimonial $testimonial, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $testimonial->getId(), $request->request->get('_token'))) {
            $entityManager->remove($testimonial);
            $entityManager->flush();
            $this->addFlash('success', 'Témoignage bien supprimé');
        }

        return $this->redirectToRoute('admin_testimonials_index', [], Response::HTTP_SEE_OTHER);
    }
}
