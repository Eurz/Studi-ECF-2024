<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiclesFeaturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fiscal_power')
            ->add('power')
            ->add('motorization')
            ->add('consumption')
            ->add('emission_rate')
            ->add('energy_class')
            ->add('color')
            ->add('length')
            ->add('width')
            ->add('height')
            ->add('unloaded_weight')
            ->add('total_weight')
            ->add('max_speed')
            ->add('number_of_doors');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
