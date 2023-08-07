<?php

namespace App\Repository;

use App\Entity\DataUserSQL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DataUserSQL>
 *
 * @method DataUserSQL|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataUserSQL|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataUserSQL[]    findAll()
 * @method DataUserSQL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataUserSQLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataUserSQL::class);
    }

//    /**
//     * @return DataUserSQL[] Returns an array of DataUserSQL objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DataUserSQL
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
