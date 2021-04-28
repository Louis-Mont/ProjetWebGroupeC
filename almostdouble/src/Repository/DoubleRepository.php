<?php

namespace App\Repository;

use App\Entity\Double;
use App\Entity\DoubleSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
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

    public function findAllQuery(DoubleSearch $search): Query
    {
        $query = $this->createQueryBuilder('d');

        if ($search->getMaxNumber()) {
            $query = $query->andWhere('d.number1 <= :maxnumber and d.number2 <= :maxnumber')
                ->setParameter('maxnumber', $search->getMaxNumber());
        }

        if ($search->getMinNumber()) {
            $query = $query->andWhere('d.number1 >= :minnumber and d.number2 >= :minnumber')
                ->setParameter('minnumber', $search->getMinNumber());
        }

        if ($search->getAskResult()) {
            $query = $query->andWhere('d.askResult = :askresult')
                ->setParameter('askresult', $search->getAskResult());
        }

        return $query->getQuery();
    }

    public function findLatest()
    {
        return $this->createQueryBuilder('d')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
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
