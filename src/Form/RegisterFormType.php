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
use Symfony\Component\Validator\Constraints\Length;

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
                'constraints' => new Length( [
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Jean '
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => new Length( [
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Codeur '
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'email',
                'constraints' => new Length( [
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Jean-codeur@campus-eni.fr'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe :',
                'attr' => [
                    'placeholder' => 'ex: Jean@14324'
                ]
            ])
            ->add('password_confirm', PasswordType::class, [
                'label' => 'Confirmez votre mot de passe',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'ex: Jean@14324'
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