<?php

namespace App\Repository;

use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Author>
 */
class AuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    //    /**
    //     * @return Author[] Returns an array of Author objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Author
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function ShowAllAuthorsQB(){
        return $this->createQueryBuilder('a')
                    ->orderBy('a.username','ASC')
                    ->andWhere('a.email LIKE :condition')
                    ->setParameter('condition',' %a%')
                    ->getQuery()
                    ->getResult();
    }

    public function ShowAllAuthorsDQL(){
        $query=$this->getEntityManager()
        ->createQuery('SELECT a FROM App\Entity\Author a WHERE 
        a.username LIKE :condition ORDER By a.username ASC')
        ->setParameter('condition ','%a%')
        ->getResult();
        return $query;
    }
}
