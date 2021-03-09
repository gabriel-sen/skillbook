<?php

namespace App\Form;

use App\Entity\BusinessUnit;
use App\Entity\Project;
use App\Entity\Skills;
use App\Entity\User;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('avatar')
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label'=> 'role_name',
                'multiple' => false
            ])
            ->add('skills', EntityType::class, [
                'class' => Skills::class,
                'choice_label'=> 'skills_name',
                'multiple' => true
            ])
            ->add('bu', EntityType::class, [
                'class' => BusinessUnit::class,
                'choice_label'=> 'bu_name',
                'multiple' => false
            ])
            ->add('project', EntityType::class, [
                'class' => Project::class,
                'choice_label'=> 'project_name',
                'multiple' => false
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