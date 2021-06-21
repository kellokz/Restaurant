<?php

namespace App\Repository;

use App\Entity\KundenDaten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KundenDaten|null find($id, $lockMode = null, $lockVersion = null)
 * @method KundenDaten|null findOneBy(array $criteria, array $orderBy = null)
 * @method KundenDaten[]    findAll()
 * @method KundenDaten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KundenDatenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KundenDaten::class);
    }

    // /**
    //  * @return KundenDaten[] Returns an array of KundenDaten objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KundenDaten
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
