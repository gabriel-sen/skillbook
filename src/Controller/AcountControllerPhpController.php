<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcountControllerPhpController extends AbstractController
{
    /**
     * @Route("/acount/controller/php", name="acount_controller_php")
     */
    public function index(): Response
    {
        return $this->render('acount_controller_php/index.html.twig', [
            'controller_name' => 'AcountControllerPhpController',
        ]);
    }
}
