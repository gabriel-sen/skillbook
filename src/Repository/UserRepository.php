<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use RuntimeException;
use Throwable;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $user): void
    {
        try {
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
        } catch (Throwable $e) {
            throw new RuntimeException('Cannot add a new user.', 0, $e);
        }
    }
}
