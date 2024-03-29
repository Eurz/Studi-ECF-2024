<?php

namespace App\Form;

use App\Entity\Services;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'empty_data' => ''
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['rows' => '20'],
            ])
            ->add('excerpt', TextareaType::class, [
                'label' => 'Résumé',
                'attr' => ['rows' => '3'],

            ])
            ->add('isPublished', ChoiceType::class, [
                'choices' => ['Brouillon' => 0, 'Publié' => 1],
                'label' => 'Etat'
            ])
            ->add(
                'imageFile',
                VichImageType::class,
                [
                    'label' => 'Image à la une',
                    'required' => false,
                    'allow_delete' => true,
                    'asset_helper' => true,
                    'attr' => [],
                    'by_reference' => false,
                    'delete_label' => 'Supprimer cette image',
                    'download_label' => 'Télécharger la photo',
                    // 'download_label' => static fn (Services $service): string => $service->getTitle(),
                    // 'imagine_pattern' => 'service_photo_320x240'
                ]
            )
            ->add(
                'photos',
                CollectionType::class,
                [
                    'allow_delete' => true,
                    'allow_add' => true,
                    'entry_type' => PhotoType::class,
                    'entry_options' => ['label' => false],
                    'prototype' => true,
                    // 'prototype_name' => 'item',
                    'by_reference' => false,
                    'required' => false
                ]
            );
        // ->add('slug');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Services::class,
        ]);
    }
}
