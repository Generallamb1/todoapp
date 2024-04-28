<?php

namespace App\Repository;

use App\Entity\Tagtodo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tagtodo>
 *
 * @method Tagtodo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tagtodo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tagtodo[]    findAll()
 * @method Tagtodo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagtodoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tagtodo::class);
    }

    //    /**
    //     * @return Tagtodo[] Returns an array of Tagtodo objects
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

    //    public function findOneBySomeField($value): ?Tagtodo
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
