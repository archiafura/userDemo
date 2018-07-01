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
            return $this->render('Pro/great.html.twig');
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
            return $this->render('User/great.html.twig');
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
        return $this->render('User/addproduct.html.twig');
    }

    /**
     * @Route("user/product", name="user_product")
     */

    public function show()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();



            return $this->render('User/productuser.html.twig', ['product' => $product]);

        }






    /**
     * @Route("/product", name="product")
     */

    public function product()
    {




        return $this->render('product.html.twig');

    }


    /**
     * @Route("pro/product", name="pro_product")
     */

    public function proproduct()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();



        return $this->render('Pro/productpro.html.twig', ['product' => $product]);

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

    /**
     * @Route("/charte", name="charte")
     */
    public function charte()
    {
        return $this->render('charte.html.twig');
    }

    /**
     * @Route("/User/charte", name="charte_user")
     */
    public function charte_user()
    {
        return $this->render('User/charte_user.html.twig');
    }

    /**
     * @Route("/forgetten", name="forgetten")
     */
    public function forgetten()
    {
        return $this->render('Security/forgetten.html.twig');
    }

    /**
     * @Route("/rules", name="rules")
     */
    public function rules()
    {
        return $this->render('rules.html.twig');
    }
}
