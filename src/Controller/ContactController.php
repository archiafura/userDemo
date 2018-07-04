<?php

namespace App\Controller;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    /**
     * @Route("/contact/formulaire", name="contact_formulaire")
     */

    public function formulaire(Request $requete, \Swift_Mailer $mailer)
    {
        $contactform = new contact();

        $formulaire = $this->createFormBuilder($contactform)
            ->add('prenom', TextType::class, array('label' => 'PRENOM','attr' => array('class' => 'form-control'))  )
            ->add('nom', TextType::class, array('label' => 'NOM','attr' => array('class' => 'form-control'))  )
            ->add('email', EmailType::class, array('label' => 'EMAIL','attr' => array('class' => 'form-control'))  )
            ->add('message', TextareaType::class, array('label' => 'VOTRE MESSAGE', 'attr' => array('cols' => '100', 'rows' => '10','class' => 'form-control'))  )
            ->add('envoyer', SubmitType::class, array('label' => "ENVOYER",'attr' => array('class' => 'envoicontact'))  )
            ->getForm();

        $formulaire->handleRequest($requete);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $contactform = $formulaire->getData();
            $envoiBDD = $this->getDoctrine()->getManager();
            $envoiBDD->persist($contactform);
            $envoiBDD->flush();
            $emailUser = $contactform->getEmail();
            $emailSetTo = array('paniermalin01@gmail.com', $emailUser);
            $messageMail = (new \Swift_Message('Panier Malin - Formulaire de Contact!'))
                ->setFrom($emailUser)
                ->setTo($emailSetTo)
                ->setBody(
                    $this->renderView(
                    // templates/emails/registration.html.twig
                        'emails/contact.html.twig',
                        array('prenom' => $contactform->getPrenom(),
                            'nom' => $contactform->getNom(),
                            'emailUser' => $emailUser,
                            'message' => $contactform->getMessage(),
                        )
                    ),
                    'text/html'
                );
            $mailer->send($messageMail);

            return $this->redirectToRoute('contactformOK');
        }

        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_PRO')) {
            return $this->render('Pro/contact.html.twig',
                array(
                    'formulaire' => $formulaire->createView(),
                ));
        }
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                return $this->render('User/contact.html.twig',
                    array(
                        'formulaire' => $formulaire->createView(),
                    ) );
        }
        else {
            return $this->render('contact.html.twig',
                array(
                    'formulaire' => $formulaire->createView(),
                ) );
        }
    }


    /**
     * @Route("/contactformOK", name="contactformOK")
     */

    public function formulaireOK()
    {
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_PRO')) {
        return $this->render('Pro/contactformOK.html.twig');
        }
        if (TRUE === $this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('User/contactformOK.html.twig');
        }
        else {
            return $this->render('contactformOK.html.twig');
        }
    }



}
