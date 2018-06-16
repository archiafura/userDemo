<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductProController extends AbstractController
{
    /**
     * @Route("/product/pro", name="productpro")
     */


    public function showpro()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('Pro/productpro.html.twig', ['product' => $product]);
    }
}
