<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchedulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('dayName', ChoiceType::class, [
            //     'label' => 'Jour',
            //     'choices' =>
            //     ['Lundi' => 'lundi', 'Mardi' => 'mardi']
            // ])
            ->add('morningStart', TimeType::class, [
                'label' => 'Début',
                'input'  => 'datetime',
                'widget' => 'single_text',
            ])
            ->add('morningEnd', TimeType::class, [
                'label' => 'Fin',
                'input'  => 'datetime',
                'widget' => 'single_text',
            ])
            ->add('afternoonStart', TimeType::class, [
                'label' => 'Début',
                'input'  => 'datetime',
                'widget' => 'single_text',
            ])
            ->add('afternoonEnd', TimeType::class, [
                'label' => 'Fin',
                'input'  => 'datetime',
                'widget' => 'single_text',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
