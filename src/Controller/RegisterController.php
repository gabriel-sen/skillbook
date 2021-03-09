<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function index()
    {

        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user);

        return $this->render('register/index.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
