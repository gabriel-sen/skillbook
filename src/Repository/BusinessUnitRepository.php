<?php

namespace App\Repository;

use App\Entity\BusinessUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BusinessUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessUnit[]    findAll()
 * @method BusinessUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessUnit::class);
    }

    // /**
    //  * @return BusinessUnit[] Returns an array of BusinessUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BusinessUnit
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
