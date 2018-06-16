<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Entity\Product;
use App\Events;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class AddProductController extends Controller
{
    /**
     * @Route("/addproduct", name="user_addproduct")
     */
    public function addProduct(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('added');
        }



        return $this->render('Pro/addproduct.html.twig',
            array('form' => $form->createView()));
    }
}
