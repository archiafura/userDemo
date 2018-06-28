<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;




class ProductController extends AbstractController
{

    /**
     * @Route("/product", name="product")
     */

    public function product()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();



        return $this->render('product.html.twig', ['product' => $product]);

    }




    /**
     * @Route("User/product", name="user_product")
     */


    public function show()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();



        return $this->render('User/productuser.html.twig', ['product' => $product]);


    }



    /**
     * @Route("Pro/product", name="pro_product")
     */


    public function showpro()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('Pro/productpro.html.twig', ['product' => $product]);
    }

}


