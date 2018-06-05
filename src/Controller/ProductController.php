<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;




class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="user_product")
     */
    public function show()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();



        return $this->render('User/product.html.twig', ['product' => $product]);


    }
}
