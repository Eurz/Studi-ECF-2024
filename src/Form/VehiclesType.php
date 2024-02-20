<?php

namespace App\Form;

use App\Entity\Equipments;
use App\Entity\Photo;
use App\Entity\Vehicle;
use App\Repository\EquipmentsRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiclesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('brandName', ChoiceType::class, [
                'label' => 'Marque',
                'choices' => [
                    'Renault' => 'Renault',
                    'Volkswagen' => 'Volkswagen',
                    'Peugeot' => 'Peugeot',
                    'Citroen' => 'Citroen'
                ]
            ])
            ->add('model', ChoiceType::class, [
                'label' => 'Modèle',
                'choices' => [
                    'Clio' => 'Clio',
                    'Mégane' => 'Megane',
                    '208' => '208',
                    'C4' => 'C4'
                ]
            ])
            ->add('releaseDate', DateType::class, [
                'label' => 'Année de mise en circulation',
                'format' => 'ddMMyyyy',
                'view_timezone' => 'Europe/Paris',
                'widget' => 'choice',
                'years' => range(1980, 2024)
            ])
            ->add('price', NumberType::class, ['label' => 'Prix'])
            ->add('featuredImage', PhotoType::class, [
                'label' => 'Image mise en avant',
                'by_reference' => false
            ])
            ->add('mileage', NumberType::class, ['label' => 'Kilométrage (kms)'])
            ->add('fiscalPower', ChoiceType::class, [
                'label' => 'Puissance fiscale',
                'choices' => ['4' => 4, '5' => 5, '6' => 6, '7' => 7],
                'placeholder' => '--- Choix ---',
                'required' => false

            ])
            // Features 
            ->add('power', NumberType::class, ['label' => 'Puissance (kWa)', 'required' => false])
            ->add('motorization', ChoiceType::class, [
                'label' => 'Motorisation',
                'placeholder' => '--- Choix ---',
                'choices' => ['Diesel' => 'diesel', 'Essence' => 'gazoline', 'Electrique' => 'electric'], 'required' => false
            ])
            ->add('engineDisplacement', NumberType::class, ['label' => 'Cylindrée (cm3)', 'required' => false])

            ->add('color', TextType::class, ['label' => 'Couleur', 'required' => false])
            ->add('maxSpeed', NumberType::class, ['label' => 'Vitesse maximale (km/h)', 'required' => false])
            ->add('numberOfDoors', ChoiceType::class, [
                'label' => 'Nombre de portes',
                'choices' => ['3' => 3, '5' => 5, '7' => 7],
                'placeholder' => '--- Choix ---',
                'required' => false
            ])
            // ->add(
            //     'photos',
            //     CollectionType::class,
            //     [
            //         'entry_type' => PhotoType::class,
            //         'allow_add' => true,
            //         'allow_delete' => true,
            //         'by_reference' => false,
            //         'prototype' => true,
            //         'prototype_name' => '__new_photo__',
            //         'delete_empty' => function (Photo $photo) {
            //             return $photo->getImageFile() === null;
            //         },
            //     ]
            // )
            ->add(
                'equipments',
                EntityType::class,
                [
                    'class' => Equipments::class,
                    'required' => false,
                    'choice_label' => 'name',
                    'by_reference' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'empty_data' => null,
                    'query_builder' => function (EquipmentsRepository $equipmentsRepository): QueryBuilder {
                        return $equipmentsRepository->createQueryBuilder('e')
                            ->where('e.is_option = :isOption')
                            ->setParameter('isOption', 0)
                            ->orderBy('e.name', 'ASC');
                    },
                ]
            )
            ->add(
                'options',
                EntityType::class,
                [
                    'class' => Equipments::class,
                    'choice_label' => 'name',
                    'by_reference' => false,
                    'required' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'empty_data' => null,
                    'query_builder' => function (EquipmentsRepository $optionsRepository): QueryBuilder {
                        return $optionsRepository->createQueryBuilder('e')
                            ->where('e.is_option = :isOption')
                            ->setParameter('isOption', 1)
                            ->orderBy('e.name', 'ASC');
                    },
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
