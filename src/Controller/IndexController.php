<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;



class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }


    /**
     * @Route("/user", name="user")
     */
    public function user()
    {
        return $this->render('User/index.html.twig');
    }

    /**
     * @Route("/great", name="great")
     */

    public function great()
    {
        if ($roles[] = 'ROLE_USER') {
            return $this->render('User/great.html.twig');
        }


        else{
            return $this->render('Admin/great.html.twig');
        }
    }

    /**
     * @Route("pro/great", name="pro_great")
     */

    public function progreat()
    {
        if ($roles[] = 'ROLE_PRO') {
            return $this->render('User/Pro/great.html.twig');
        }


        else{
            return $this->render('Admin/great.html.twig');
        }
    }


    /**
     * @Route("/aboutus", name="aboutus")
     */
    public function aboutus()
    {
        return $this->render('aboutus.html.twig');
    }


    /**
     * @Route("/added", name="added")
     */
    public function added()
    {
        return $this->render('User/added.html.twig');
    }

    /**
     * @Route("/addproduct", name="addproduct")
     */
    public function addproduct()
    {
        return $this->render('Pro/addproduct.html.twig');
    }

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
     * @Route("/pro", name="pro")
     */
    public function pro()
    {
        return $this->render('Pro/index.html.twig');
    }

    /**
     * @Route("/logincheck", name="logincheck")
     */
    public function logincheck()
    {
        return $this->render('Security/logincheck.html.twig');
    }



}
