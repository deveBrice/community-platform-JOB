<?php

namespace App\Repository;

use App\Entity\SocialNetworkPublisher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SocialNetworkPublisher|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialNetworkPublisher|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialNetworkPublisher[]    findAll()
 * @method SocialNetworkPublisher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialNetworkPublisherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocialNetworkPublisher::class);
    }

    // /**
    //  * @return SocialNetworkPublisher[] Returns an array of SocialNetworkPublisher objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SocialNetworkPublisher
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
