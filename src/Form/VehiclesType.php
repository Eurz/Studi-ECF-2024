<?php

namespace App\Form;

use App\Entity\Photo;
use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('releaseDate', null, ['label' => 'Année de mise en circulation'])
            ->add('price', IntegerType::class, ['label' => 'Prix'])
            ->add('featuredImage', TextType::class, ['label' => 'Image mise en avant'])
            ->add('mileage', IntegerType::class, ['label' => 'Kilométrage (kms)'])
            ->add('fiscalPower', ChoiceType::class, [
                'label' => 'Puissance fiscale',
                'choices' => [
                    '4' => 4, '5' => 5, '6' => 6
                ],
            ],)
            // Features 
            ->add('power', IntegerType::class, ['label' => 'Puissance (kWa)', 'required' => false])
            ->add('motorization', ChoiceType::class, ['label' => 'Motorisation', 'choices' => ['Diesel' => 'diesel', 'Essence' => 'gazoline', 'Electrique' => 'electric'], 'required' => false])
            ->add('engineDisplacement', NumberType::class, ['label' => 'Cylindrée (cm3)', 'required' => false])

            ->add('color', TextType::class, ['label' => 'Couleur', 'required' => false])
            ->add('maxSpeed', IntegerType::class, ['label' => 'Vitesse maximale (km/h)', 'required' => false])
            ->add('numberOfDoors', IntegerType::class, ['label' => 'Nombre de portes', 'required' => false])
            ->add(
                'photos',
                CollectionType::class,
                [
                    'entry_type' => PhotoType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'prototype' => true,
                    'prototype_name' => '__new_photo__',
                    'delete_empty' => function (Photo $photo) {
                        return $photo->getImageFile() === null;
                    },
                ]
            );

        // ->add('consumption', NumberType::class, ['label' => 'Consommation (l/100km)', 'required' => false])
        // ->add('emissionRate', IntegerType::class, ['label' => 'Emission (g CO2/km)', 'required' => false])
        // ->add('energyClass', TextType::class, ['required' => false,])
        // ->add('length', IntegerType::class, ['label' => 'Longueur', 'row_attr' => ['class' => 'test', 'id' => 'coucou'], 'required' => false])
        // ->add('width', IntegerType::class, ['label' => 'Largeur', 'required' => false])
        // ->add('height', IntegerType::class, ['label' => 'Hauteur', 'required' => false])
        // ->add('unloadedWeight', IntegerType::class, ['label' => 'Poids à vide (kg)', 'required' => false])
        // ->add('totalWeight', IntegerType::class, ['label' => 'Poids total en charge (kg)', 'required' => false])
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
