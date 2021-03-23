<?php

namespace App\Repository;

use App\Entity\BusinessUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

class BusinessUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessUnit::class);
    }

    public function findAll(): ArrayCollection
    {
        return new ArrayCollection(
            $this->createQueryBuilder('bu')
                ->getQuery()
                ->getResult()
        );
    }
}
