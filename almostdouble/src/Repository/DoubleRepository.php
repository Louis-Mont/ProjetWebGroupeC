<?php

namespace App\Repository;

use App\Entity\Double;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Double|null find($id, $lockMode = null, $lockVersion = null)
 * @method Double|null findOneBy(array $criteria, array $orderBy = null)
 * @method Double[]    findAll()
 * @method Double[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoubleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Double::class);
    }

    // /**
    //  * @return Double[] Returns an array of Double objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Double
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
