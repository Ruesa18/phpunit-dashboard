<?php

namespace App\Repository;

use App\Entity\Testsuite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Testsuite>
 *
 * @method Testsuite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testsuite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testsuite[]    findAll()
 * @method Testsuite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestsuiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testsuite::class);
    }

//    /**
//     * @return Testsuite[] Returns an array of Testsuite objects
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

//    public function findOneBySomeField($value): ?Testsuite
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
