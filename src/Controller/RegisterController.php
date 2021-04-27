<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
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


class RegisterController extends AbstractController
{
    /** POUR TESTER
     * @Route("/{id}/debug")
     */
    public function foo(
        string $id,
        UserRepository $userRepository
    ): Response {
        return $this->render('debug.html.twig',[
            'user' => $userRepository->find($id),
        ]);
    }

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function index(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        SkillRepository $skillRepository,
        BusinessUnitRepository $businessUnitRepository,
        RoleRepository $roleRepository,
        ProjectRepository $projectRepository,
        UserRepository $userRepository

    ): Response {
        $user = new User();

        $form = $this->createForm(RegisterFormType::class, $user);
        $form->handleRequest($request); // Parse la requette, valide les contraintes de l'objet RegisterFormType dans le fichier RegisterFormType.php

        if ($form->isSubmitted() && $form->isValid()){
            /** @var User $user */
            $user = $form->getData();

            $user->register(
                $businessUnitRepository->findAllById(
                     $request->request->get('businessUnits', [])
                ),
                $skillRepository->findAllById(
                    $request->request->get('skills', [])
                ),
                $projectRepository->findAllById(
                    $request->request->get('projects', [])
                ),
                $roleRepository->findAllById(
                    $request->request->get('roles', [])
                )
            );

            /* Encryptage des mots de passes en base */
            $password = $encoder->encodePassword($user,$user->getPassword()) ;
            $user ->setPassword($password);
            /* test dd($password) ok */


            $userRepository->add($user);
           return $this->redirectToRoute('liste_user');
        }

        return $this->render('register/index.html.twig',[
            'form' => $form->createView(),
            'businessUnits' => $businessUnitRepository->findAll(),
            'projects' => $projectRepository->findAll(),
            'skills' => $skillRepository->findAll(),
            'roles' => $roleRepository->findAll(),
        ]);
    }
}
