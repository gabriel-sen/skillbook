<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('avatar', TextType::class, [
                'label' => 'Votre image de profil :'
            ])
            ->add('firstname',TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Jean '
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Codeur '
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'email',
                'attr' => [
                    'placeholder' => 'Jean-codeur@campus-eni.fr'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe :',
                'attr' => [
                    'placeholder' => 'Jean@14324'
                ]
            ])
            ->add('password_confirm', PasswordType::class, [
                'label' => 'Confirmez votre mot de passe',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Jean@14324'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}