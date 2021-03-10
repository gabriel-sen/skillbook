<?php

namespace App\Form;

use App\Entity\BusinessUnit;
use App\Entity\Project;
use App\Entity\Skills;
use App\Entity\User;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterFormType extends AbstractType
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
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label'=> 'role_name',
                'multiple' => false
            ])
            ->add('skills', EntityType::class, [
                'class' => Skills::class,
                'label' => "Compétences",
                'choice_label'=> 'skills_name',
                'multiple' => true,
                'expanded' => true
            ])
            ->add('bu', EntityType::class, [
                'class' => BusinessUnit::class,
                'label' => 'Unités de Business',
                'choice_label'=> 'bu_name',
                'multiple' => false
            ])
            ->add('project', EntityType::class, [
                'class' => Project::class,
                'choice_label'=> 'project_name',
                'multiple' => false
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