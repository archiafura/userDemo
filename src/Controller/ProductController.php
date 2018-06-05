<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Repository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="user_product")
     */
    public function show()
    {

//        $product = $this->getDoctrine()
//            ->getRepository(Product::class)
//
//            ->findAll();

    $products = 'truc';


        return $this->render('User/product.html.twig', ['product' => $products]);
    }
}
