<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use App\Repository\BusinessUnitRepository;
use App\Repository\ProjectRepository;
use App\Repository\RoleRepository;
use App\Repository\SkillRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    /**
     * AccountPasswordController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/account/modifier-mot-de-passe", name="account_password")
     */
    public function index(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        SkillRepository $skillRepository,
        BusinessUnitRepository $businessUnitRepository,
        RoleRepository $roleRepository,
        ProjectRepository $projectRepository
    ): Response
    {
        $notification = null;
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $old_password = $form->get('old_password')->getData();

            if($encoder ->isPasswordValid($user, $old_password)){
                $new_password = $form->get('new_password')->getData();
                $password = $encoder-> encodePassword($user, $new_password);

                $user->setPassword($password);
                $this->entityManager->flush();
                $notification = "Votre mot de passe à bien été mis à jour.";
            } else{
                $notification = "Votre mot de passe actuel, n'est pas le bon.";
            }
        }



        return $this->render('account/password.html.twig', [
            'businessUnits' => $businessUnitRepository->findAll(),
            'skills' => $skillRepository->findAll(),
            'projects' => $projectRepository->findAll(),
            'roles' => $roleRepository->findAll(),
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
