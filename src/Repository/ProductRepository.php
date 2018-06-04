<?php

namespace App\Repository;

use App\Entity\Product;
//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;



///**
 //* @method Product|null find($id, $lockMode = null, $lockVersion = null)
 //* @method Product|null findOneBy(array $criteria, array $orderBy = null)

 //* @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 //*/




class ProductRepository extends EntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param $product
     * @return Product[] Returns an array of Product objects
     */

    public function findAll() : array
    {

        /*
        $result = $this->createQueryBuilder('p')

            ->select(array('product'))
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();


       return array("getResult" => $result->getResult(), "getArrayResult" => $result->getArrayResult(),);

        */
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT * FROM product p
        ORDER BY p.id ASC
        ';

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();





    }


    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
