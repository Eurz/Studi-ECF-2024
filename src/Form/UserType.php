<?php

namespace App\Form;

use App\Entity\User;
use App\Helpers\RolesHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $attributes = $builder->getAttributes();
        $entityId = $builder->getData()->getId();
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('roles', ChoiceType::class, [
                // 'choices' => ['Administrateur' => 'ROLE_ADMIN', 'Employé' => 'ROLE_EMPLOYEE'],
                'label' => 'Role',
                'choice_loader' => new CallbackChoiceLoader(static function (): array {
                    return RolesHelper::getRoles();
                }),
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped' => is_null($entityId),
                'required' => is_null($entityId),
                'disabled' => !is_null($entityId)
            ])
            ->add(
                'lastName',
                TextType::class,
                [
                    'label' => 'Nom'
                ]
            )
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'Prénom'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
