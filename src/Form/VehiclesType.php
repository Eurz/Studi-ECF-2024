<?php

namespace App\Form;

use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('type', TextType::class, ['label' => 'Type'])
            ->add('model', ChoiceType::class, [
                'label' => 'Modèle',
                'choices' => [
                    'Clio' => 'Clio',
                    'Mégane' => 'Megane',
                    '208' => '208',
                    'C4' => 'C4'
                ]
            ])
            ->add('title', TextType::class, ['label' => 'Titre'])
            // ->add('createdAt')
            // ->add('updatedAt')
            ->add('releaseDate', null, ['label' => 'Année de mise en circulation'])
            ->add('price', IntegerType::class, ['label' => 'Prix'])
            ->add('featuredImage', TextType::class, ['label' => 'Image mise en avant'])
            ->add('mileage', IntegerType::class, ['label' => 'Kilométrage (kms)'])
            ->add('fiscalPower', ChoiceType::class, ['label' => 'Puissance fiscale', 'choices' => [
                '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6
            ]],)
            // Features 
            ->add('power', IntegerType::class, ['label' => 'Puissance (kWa)'])
            ->add('motorization', ChoiceType::class, ['label' => 'Motorisation', 'choices' => ['Diesel' => 'diesel', 'Essence' => 'gazoline', 'Electrique' => 'electric']])
            ->add('engineDisplacement', NumberType::class, ['label' => 'Cylindrée (cm3)'])
            ->add('consumption', NumberType::class, ['label' => 'Consommation (l/100km)'])
            ->add('emissionRate', IntegerType::class, ['label' => 'Emission (g CO2/km)'])
            ->add('energyClass')
            ->add('color', TextType::class, ['label' => 'Couleur'])
            ->add('length', IntegerType::class, ['label' => 'Longueur'])
            ->add('width', IntegerType::class, ['label' => 'Largeur'])
            ->add('height', IntegerType::class, ['label' => 'Hauteur'])
            ->add('unloadedWeight', IntegerType::class, ['label' => 'Poids à vide (kg)'])
            ->add('totalWeight', IntegerType::class, ['label' => 'Poids total en charge (kg)'])
            ->add('maxSpeed', IntegerType::class, ['label' => 'Vitesse maximale (km/h)'])
            ->add('numberOfDoors', IntegerType::class, ['label' => 'Nombre de portes']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
