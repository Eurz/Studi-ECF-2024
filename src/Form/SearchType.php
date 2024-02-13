<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'minPrice',
                IntegerType::class,
                [
                    'label' => 'Prix min.', 'required' => false
                ]
            )
            ->add(
                'maxPrice',
                IntegerType::class,
                [
                    'label' => 'Prix max.', 'required' => false
                ]
            )
            ->add(
                'minMileage',
                IntegerType::class,
                [
                    'label' => 'Kms min.', 'required' => false
                ]
            )
            ->add(
                'maxMileage',
                IntegerType::class,
                [
                    'label' => 'Kms max.', 'required' => false
                ]
            )
            // ->add(
            //     'releaseDate',
            //     DateType::class,
            //     [
            //         'label' => 'Kms max.',
            //     ]
            // )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
