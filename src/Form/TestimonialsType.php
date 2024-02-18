<?php

namespace App\Form;

use App\Entity\Testimonial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('userName', TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add(
                'comment',
                TextareaType::class,
                [
                    'label' => 'Commentaire',
                    'sanitize_html' => true
                ]
            );

        if ($options['isAdmin']) {
            $builder = $builder->add('isPublished', ChoiceType::class, [
                'label' => 'Etat',
                'choices' => ['Brouillon' => 0, 'Publié' => 1]
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimonial::class,
            'isAdmin' => false,
        ]);

        $resolver->setAllowedTypes('isAdmin', 'bool');
    }
}
