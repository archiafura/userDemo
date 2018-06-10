<?php

namespace App\Controller;

use App\Entity\EspaceProfessionnel;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        $formulaireProduit = new EspaceProfessionnel();

        $formulaireProduit = $this->createFormBuilder($formulaireProduit)
            ->add('typeProduit', TextType::class, array('label' => 'Type de produit',))
            ->add('dureeDispo', TextType::class, array('label' => 'Durée de disponibilité',))
            ->add('horaireDispo', TextType::class, array('label' => 'Horaire de disponibilité'))
            ->add('conseilUtilisation', TextType::class, array('label' => 'Conseil d\'utilisation'))
            ->add('imgProduit', TextType::class, array('label' => 'Ajouter une image'))
            ->add('envoyer', SubmitType::class, array('label' => 'AJOUTER'))

            ->getForm();

        $formulaireProduit->handleRequest($requete);

        if ($formulaireProduit->isSubmitted() && $formulaireProduit->isValid()){

            $formulaireProduit = $formulaireProduit->getData();

            $envoiBDD = $this->getDoctrine()->getManager();
            $envoiBDD->persist($formProduit);
            $envoiBDD->flush();
        }
        //////////////////////////////FORMULAIRE 2////////////////////////////////////////////////////////

        $formEvent = new EspaceProfessionnel();

        $formulaireEvent = $this->createFormBuilder($formEvent)
            ->add('typeEvent', TextType::class, array('label' => 'Type d\'evenement',))
            ->add('dateEvent', TextType::class, array('label' => 'Date de l\'evenement',))
            ->add('LieuEvent', TextType::class, array('label' => 'Lieu de l\'evenement',))
            ->add('envoyer', SubmitType::class, array('label' => 'AJOUTER'))

            ->getForm();

        $formulaireEvent->handleRequest($requete);

        if ($formulaireEvent->isSubmitted() && $formulaireEvent->isValid()){

            $formEvent = $formulaireEvent->getData();

            $envoiBDD = $this->getDoctrine()->getManager();
            $envoiBDD->persist($formEvent);
            $envoiBDD->flush();
        }


        /////////////////////////////////////////////////////////



        return $this->render( 'Pro/espace_professionnel.html.twig',
            array(
                'formulaireProduit' => $formulaireProduit->createView(),
                'formulaireEvent' => $formulaireEvent->createView()
            )
        );

    }


}
