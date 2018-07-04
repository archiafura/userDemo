<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Product;

class ListeProductController extends Controller
{
    /**
     * @Route("/liste/product", name="liste_product")
     */
    public function index()
    {
        $request = Request::createFromGlobals();
        $nomProduit = $request->query->get('name');

        if($nomProduit == "aubergine.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'aubergine']);
        }
        elseif ($nomProduit == "banane.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'banane']);
        }
        elseif ($nomProduit == "bierre.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'bierre']);
        }
        elseif ($nomProduit == "brocolis.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'brocolis']);
        }
        elseif ($nomProduit == "carotte.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'carotte']);
        }
        elseif ($nomProduit == "cerise.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'cerise']);
        }
        elseif ($nomProduit == "courgette.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'courgette']);
        }
        elseif ($nomProduit == "fraise.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'fraise']);
        }
        elseif ($nomProduit == "fromage.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'fromage']);
        }
        elseif ($nomProduit == "oignon.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'oignon']);
        }
        elseif ($nomProduit == "poire.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'poire']);
        }
        elseif ($nomProduit == "Poireau.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'poireau']);
        }
        elseif ($nomProduit == "pomme.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'pomme']);
        }
        elseif ($nomProduit == "pomme de terre.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'pomme de terre']);
        }
        elseif ($nomProduit == "raisin.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'raisin']);
        }
        elseif ($nomProduit == "tomate.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'tomate']);
        }
        elseif ($nomProduit == "vin.png"){
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findBy(['name' => 'vin']);
        }


        return $this->render('liste_product/index.html.twig', [
            'controller_name' => 'ListeProductController',
            'requete' => $request,
            'nomProduit' => $nomProduit,
            'produit' => $product
        ]);
    }
}
