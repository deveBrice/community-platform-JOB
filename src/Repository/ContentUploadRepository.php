<?php

namespace App\Repository;

use App\Entity\ContentUpload;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentUpload|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentUpload|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentUpload[]    findAll()
 * @method ContentUpload[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentUploadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentUpload::class);
    }

    // /**
    //  * @return ContentUpload[] Returns an array of ContentUpload objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContentUpload
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
