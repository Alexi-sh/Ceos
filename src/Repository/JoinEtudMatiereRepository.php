<?php

namespace App\Repository;

use App\Entity\JoinEtudMatiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JoinEtudMatiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoinEtudMatiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoinEtudMatiere[]    findAll()
 * @method JoinEtudMatiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoinEtudMatiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoinEtudMatiere::class);
    }

    // /**
    //  * @return JoinEtudMatiere[] Returns an array of JoinEtudMatiere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JoinEtudMatiere
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
