<?php

namespace App\Repository;

use App\Entity\BusinessUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ManagerRegistry;

class BusinessUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessUnit::class);
    }

    public function findAllById(array $ids): array
    {
        return $this->createQueryBuilder('bu')
                ->where('bu.id in (:ids)')
                ->setParameter('ids', $ids, Connection::PARAM_INT_ARRAY)
                ->getQuery()
                ->getResult();
    }
}
