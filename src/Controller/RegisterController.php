<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use App\Repository\BusinessUnitRepository;
use App\Repository\ProjectRepository;
use App\Repository\RoleRepository;
use App\Repository\SkillRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
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

    /**
     * @Route("/inscription", name="register")
     */
    public function index(
        Request $request,
        SkillRepository $skillRepository,
        BusinessUnitRepository $businessUnitRepository,
        RoleRepository $roleRepository,
        ProjectRepository $projectRepository,
        UserRepository $userRepository
    ): Response {
        $user = new User();

        $form = $this->createForm(RegisterFormType::class, $user);
        $form->handleRequest($request);

        $businessUnits = $businessUnitRepository->findAll();
        $projects = $projectRepository->findAll();
        $skills = $skillRepository->findAll();
        $roles = $roleRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()){
            /** @var User $user */
            $user = $form->getData();

            $user->register(
                $businessUnits->matching(
                    Criteria::create()
                        ->where(
                            Criteria::expr()
                                ->in('id', array_map('intval', $request->request->get('businessUnits', []))
                            )
                        )
                )->toArray(),
                $skills->matching(
                    Criteria::create()
                        ->where(
                            Criteria::expr()
                                ->in('id', array_map('intval', $request->request->get('skills', []))
                            )
                        )
                )->toArray(),
                $projects->matching(
                    Criteria::create()
                        ->where(
                            Criteria::expr()
                                ->in('id', array_map('intval', $request->request->get('projects', []))
                            )
                        )
                )->toArray(),
                $roles->matching(
                    Criteria::create()
                        ->where(
                            Criteria::expr()
                                ->in('id', array_map('intval', $request->request->get('roles', []))
                            )
                        )
                )->toArray()
            );

            $userRepository->add($user);
        }

        return $this->render('register/index.html.twig',[
            'form' => $form->createView(),
            'businessUnits' => $businessUnits,
            'projects' => $projects,
            'skills' => $skills,
            'roles' => $roles,
        ]);
    }
}
