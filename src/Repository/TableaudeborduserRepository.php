<?php

namespace App\Repository;

use App\Entity\Tableaudeborduser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tableaudeborduser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tableaudeborduser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tableaudeborduser[]    findAll()
 * @method Tableaudeborduser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TableaudeborduserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tableaudeborduser::class);
    }

//    /**
//     * @return Tableaudeborduser[] Returns an array of Tableaudeborduser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tableaudeborduser
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
