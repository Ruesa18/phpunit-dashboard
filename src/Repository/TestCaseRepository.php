<?php

namespace App\Repository;

use App\Entity\TestCase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TestCase>
 *
 * @method TestCase|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestCase|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestCase[]    findAll()
 * @method TestCase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestCaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestCase::class);
    }

//    /**
//     * @return TestCase[] Returns an array of TestCase objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TestCase
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
