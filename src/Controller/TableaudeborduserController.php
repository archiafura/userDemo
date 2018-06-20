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
            ->add('prenominfos', TextType::class, array('label' => 'PRENOM','attr' => array('class' => 'form-control'))  )
            ->add('nominfos', TextType::class, array('label' => 'NOM','attr' => array('class' => 'form-control'))  )
            ->add('telephone', TelType::class, array('label' => 'TELEPHONE','attr' => array('class' => 'form-control'))  )
            ->add('emailinfos', EmailType::class, array('label' => 'EMAIL','attr' => array('class' => 'form-control'))  )
            ->add('livraison', TextType::class, array('label' => 'ADRESSE DE LIVRAISON','attr' => array('class' => 'form-control'))  )
            ->add('facturation', TextType::class, array('label' => 'ADRESSE DE FACTURATION','attr' => array('class' => 'form-control'))  )
            ->add('cplivraison', TextType::class, array('label' => 'CODE POSTAL','attr' => array('class' => 'form-control'))  )
            ->add('villelivraison', TextType::class, array('label' => 'VILLE','attr' => array('class' => 'form-control'))  )
            ->add('mdpinfos', PasswordType::class, array('label' => 'MOT DE PASSE','attr' => array('class' => 'form-control'))  )
            ->add('confirmmdpinfos', PasswordType::class, array('label' => 'CONFIRMER LE MOT DE PASSE','attr' => array('class' => 'form-control'))  )
            ->add('prenomlivraison', TextType::class, array('label' => 'PRENOM','attr' => array('class' => 'form-control'))  )
            ->add('nomlivraison', TextType::class, array('label' => 'NOM','attr' => array('class' => 'form-control'))  )
            ->add('cpfacturation', TextType::class, array('label' => 'CODE POSTAL','attr' => array('class' => 'form-control'))  )
            ->add('villefacturation', TextType::class, array('label' => 'VILLE','attr' => array('class' => 'form-control'))  )
            ->add('prenomfacturation', TextType::class, array('label' => 'PRENOM','attr' => array('class' => 'form-control'))  )
            ->add('nomfacturation', TextType::class, array('label' => 'NOM','attr' => array('class' => 'form-control'))  )
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
