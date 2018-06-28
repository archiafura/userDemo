<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Entity\Panier;
use App\Events;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class AddProductController extends Controller
{
    /**
     * @Route("/addproduct", name="user_addproduct")
     */
    public function addProduct(Panier $product)
    {


        if (!$this->panier->contains($product)) {
            $this->product[] = $product;
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('added');
        }



        return $this->render('User/addproduct.html.twig');
    }
}
