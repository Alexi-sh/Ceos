<?php

namespace App\Repository;

use App\Entity\Tetedecon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tetedecon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tetedecon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tetedecon[]    findAll()
 * @method Tetedecon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TetedeconRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tetedecon::class);
    }

    // /**
    //  * @return Tetedecon[] Returns an array of Tetedecon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tetedecon
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
