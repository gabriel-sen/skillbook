<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeUserController extends AbstractController
{
    /**
     * @Route("/listeuser", name="liste_user")
     */
    public function index(): Response
    {
        return $this->render('liste_user/index.html.twig', [
            'controller_name' => 'ListeUserController',
        ]);
    }
}
