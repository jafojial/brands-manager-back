<?php

namespace App\Repository;

use App\Entity\TopList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TopList>
 */
class TopListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TopList::class);
    }

    //    /**
    //     * @return TopList[] Returns an array of TopList objects
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

    //    public function findOneBySomeField($value): ?TopList
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    
    /**
     * 
     */
    public function save(TopList $topList): TopList
    {
        // _em is EntityManager which is DI by the base class
        $this->_em->persist($topList);
        $this->_em->flush();

        return $topList;
    }

    
    /**
     * 
     */
    public function delete(TopList $topList)
    {
        // _em is EntityManager which is DI by the base class
        $this->_em->remove($topList);
        $this->_em->flush();
    }
}
