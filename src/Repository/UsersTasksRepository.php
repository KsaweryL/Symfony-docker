<?php

namespace App\Repository;

use App\Entity\UsersTasks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersTasks>
 *
 * @method UsersTasks|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersTasks|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersTasks[]    findAll()
 * @method UsersTasks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersTasksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersTasks::class);
    }

//    /**
//     * @return UsersTasks[] Returns an array of UsersTasks objects
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

//    public function findOneBySomeField($value): ?UsersTasks
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
