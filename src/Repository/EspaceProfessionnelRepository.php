<?php

namespace App\Repository;

use App\Entity\EspaceProfessionnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EspaceProfessionnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspaceProfessionnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspaceProfessionnel[]    findAll()
 * @method EspaceProfessionnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspaceProfessionnelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EspaceProfessionnel::class);
    }

//    /**
//     * @return EspaceProfessionnelController[] Returns an array of EspaceProfessionnelController objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EspaceProfessionnelController
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
