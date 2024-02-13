<?php

namespace App\Form;

use App\Entity\Photo;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageName', VichFileType::class, [
                'label' => 'Ajouter une photo',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
            ])
            // ->add('imageSize')
            // ->add('mimeType')
            // ->add('vehicle', EntityType::class, [
            //     'class' => Vehicle::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
