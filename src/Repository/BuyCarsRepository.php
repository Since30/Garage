<?php

namespace App\Repository;

use App\Entity\BuyCars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BuyCars>
 *
 * @method BuyCars|null find($id, $lockMode = null, $lockVersion = null)
 * @method BuyCars|null findOneBy(array $criteria, array $orderBy = null)
 * @method BuyCars[]    findAll()
 * @method BuyCars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuyCarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BuyCars::class);
    }

//    /**
//     * @return BuyCars[] Returns an array of BuyCars objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BuyCars
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
