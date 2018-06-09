<?php

namespace App\Controller;

use App\Entity\Tableaudeborduser;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TableaudeborduserController extends Controller
{
    /**
     * @Route("/tableaudeborduser", name="tableaudeborduser")
     */
    public function index()
    {
        return $this->render('tableaudeborduser/index.html.twig', [
            'controller_name' => 'TableaudeborduserController',
        ]);
    }
    /**
     * @Route("/tableaudeborduser/formulaire", name="tableaudeborduser_formulaire")
     */

    public function formulaire(Request $requete)
    {
        $infosform = new Tableaudeborduser();

        $formulaire = $this->createFormBuilder($infosform)
            ->add('prenominfos', TextType::class, array('label' => 'PRENOM',) )
            ->add('nominfos', TextType::class, array('label' => 'NOM',) )
            ->add('telephone', TelType::class, array('label' => 'TELEPHONE',) )
            ->add('emailinfos', EmailType::class, array('label' => 'EMAIL',)  )
            ->add('livraison', TextType::class, array('label' => 'ADRESSE DE LIVRAISON',) )
            ->add('facturation', TextType::class, array('label' => 'ADRESSE DE FACTURATION',) )
            ->add('cplivraison', TextType::class, array('label' => 'CODE POSTAL',)  )
            ->add('villelivraison', TextType::class, array('label' => 'VILLE',)  )
            ->add('mdpinfos', PasswordType::class, array('label' => 'MOT DE PASSE',))
            ->add('confirmmdpinfos', PasswordType::class, array('label' => 'CONFIRMER LE MOT DE PASSE',))
            ->add('prenomlivraison', TextType::class, array('label' => 'PRENOM',) )
            ->add('nomlivraison', TextType::class, array('label' => 'NOM',) )
            ->add('cpfacturation', TextType::class, array('label' => 'CODE POSTAL',)  )
            ->add('villefacturation', TextType::class, array('label' => 'VILLE',)  )
            ->add('prenomfacturation', TextType::class, array('label' => 'PRENOM',) )
            ->add('nomfacturation', TextType::class, array('label' => 'NOM',) )
            ->add('envoyer', SubmitType::class, array('label' => "Mettre à jour les infos"))
            ->getForm();

        $formulaire->handleRequest($requete);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {

            $infosform = $formulaire->getData();
            $envoiBDD = $this->getDoctrine()->getManager();
            $envoiBDD->persist($infosform);
            $envoiBDD->flush();

            return $this->redirectToRoute('infosformOK');

        }

        return $this->render('User/form_infos_perso.html.twig',
            array(
                'formulaire' => $formulaire->createView(),
            ));
    }

    /**
     * @Route("/infosformOK", name="infosformOK")
     */

    public function formulaireOK()
    {
        return $this->render('User/infosformOK.html.twig');
    }

}
