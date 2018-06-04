<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="user_product")
     */
    public function show(EntityManagerInterface $em): Response
    {


        $products =$em->getRepository(Product::class)->findAll();




        return $this->render('User/product.html.twig', ['products' => $products,]);
    }
}
