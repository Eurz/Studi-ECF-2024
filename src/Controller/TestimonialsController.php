<?php

namespace App\Controller;

use App\Entity\Testimonial;
use App\Form\TestimonialsType;
use App\Repository\TestimonialsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/testimonials_', name: 'testimonials_')]
class TestimonialsController extends AbstractController
{
    #[Route('/testimonials', name: 'index')]
    public function index(Request $request, EntityManagerInterface $entityManager, TestimonialsRepository $testimonialRepository): Response
    {

        $isAdmin = true;
        $testimonial = new Testimonial();
        $formTestimonial = $this->createForm(TestimonialsType::class, $testimonial);
        $formTestimonial->handleRequest($request);

        if ($formTestimonial->isSubmitted() && $formTestimonial->isValid()) {
            $testimonial->setIsPublished(0);
            $testimonial->setCreatedAt(new \DateTime());

            $entityManager->persist($testimonial);
            $entityManager->flush();

            $this->addFlash('success', 'Votre témoignage a bien été envoyé.');
            return $this->redirectToRoute('testimonials_index', [], Response::HTTP_SEE_OTHER);
        }
        $testimonials = $testimonialRepository->findBy(['isPublished' => 1]);
        return $this->render('testimonials/index.html.twig', [
            'pageTitle' => 'Témoignages de nos clients',
            'testimonials' => $testimonials,
            'form' => $formTestimonial
        ]);
    }
}
