<?php

namespace App\Repository;

use App\Entity\ListeCouples;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeCouples|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeCouples|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeCouples[]    findAll()
 * @method ListeCouples[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeCouplesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeCouples::class);
    }

    // /**
    //  * @return ListeCouples[] Returns an array of ListeCouples objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeCouples
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
