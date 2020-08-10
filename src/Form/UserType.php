<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('enabled', ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'choices' => [
                    'True' => true,
                    'False' => false
                ]
            ])
            ->add('password', PasswordType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('roles', ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'multiple' => true,
                'choices' => [
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_MODERATOR' => 'ROLE_MODERATOR',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
