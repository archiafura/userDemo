<?php

namespace App\Controller;

use App\Entity\EspaceProfessionnel;
use App\Entity\Event;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormTypeInterface;

class EspaceProfessionnelController extends Controller
{
    /**
     * @Route("/espace/professionnel", name="espace_professionnel")
     */
    public function index()
    {
        return $this->render('Pro/espace_professionnel.html.twig', [
            'controller_name' => 'EspaceProfessionnelController',
        ]);
    }

    /**
     * @Route("/espace/professionnel/formulaire", name="espace_professionnel_formulaire")
     */
    public function formulaireAjoutPdt(Request $requete)
    {

        //////////////////////FOMULAIRE 1//////////////////////////


        $formulaireProduit = new Product();
        $formulaireProduit = $this->createFormBuilder($formulaireProduit)
            ->add('name', TextType::class, array('label' => 'Type de produit',))
            ->add('quantity', IntegerType::class, array('label' => 'Quantité du produit',))
            ->add('fournisseur', TextType::class, array('label' => 'Fournisseur du produit',))
            ->add('description', TextType::class, array('label' => 'Description du produit',))
            ->add('price', IntegerType::class, array('label' => 'Prix du produit',))
            ->add('envoyer', SubmitType::class, array('label' => 'AJOUTER'))

            ->getForm();
        $formulaireProduit->handleRequest($requete);
        if ($formulaireProduit->isSubmitted() && $formulaireProduit->isValid()){

            $formProduit = $formulaireProduit->getData();
            $formProduit->setUser($this->getUser());
            $envoiBDD = $this->getDoctrine()->getManager();
            $envoiBDD->persist($formProduit);
            $envoiBDD->flush();
        }

        //////////////////////////////FORMULAIRE 2////////////////////////////////////////////////////////

        $formEvent = new Event();

        $formulaireEvent = $this->createFormBuilder($formEvent)
            ->add('typeEvent', TextType::class, array('label' => 'Type d\'evenement',))
            ->add('dateEvent', TextType::class, array('label' => 'Date de l\'evenement',))
            ->add('LieuEvent', TextType::class, array('label' => 'Lieu de l\'evenement',))
//            ->add('user', HiddenType::class, array('value' => $idUser))
            ->add('envoyer', SubmitType::class, array('label' => 'AJOUTER'))

            ->getForm();

        $formulaireEvent->handleRequest($requete);

        if ($formulaireEvent->isSubmitted() && $formulaireEvent->isValid()){

            $formEvent = $formulaireEvent->getData();
            $formEvent->setUser($this->getUser());

            $envoiBDD = $this->getDoctrine()->getManager();
            $envoiBDD->persist($formEvent);
            $envoiBDD->flush();
        }


        //////////////////////////////////////////////////////
        $produit = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        $events = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findAll();

        /////////////////////////////////////////////////////////



        return $this->render( 'Pro/espace_professionnel.html.twig',
            array(
                'formulaireProduit' => $formulaireProduit->createView(),
                'formulaireEvent' => $formulaireEvent->createView(),
                'product' => $produit,
                'events' => $events
            )
        );

    }



}
