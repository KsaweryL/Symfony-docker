<?php

namespace App\Repository;

use App\Entity\UserDataSQL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserDataSQL>
 *
 * @method UserDataSQL|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserDataSQL|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserDataSQL[]    findAll()
 * @method UserDataSQL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDataSQLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserDataSQL::class);
    }

//    /**
//     * @return UserDataSQL[] Returns an array of UserDataSQL objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserDataSQL
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
