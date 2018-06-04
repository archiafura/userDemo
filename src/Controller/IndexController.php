<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/product", name="product")
     */

    public function show()
    {

        return $this->render('User/product.html.twig');
    }



}
