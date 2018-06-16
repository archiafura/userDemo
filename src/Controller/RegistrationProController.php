<?php
// src/Controller/RegistrationController.php
namespace App\Controller;


use App\Form\UserType;
use App\Entity\User;
use App\Events;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class RegistrationProController extends Controller
{
    /**
     * @Route("/proregister", name="pro_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, EventDispatcherInterface $eventDispatcher, \Swift_Mailer $mailer  )
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            // Par defaut l'utilisateur aura toujours le rôle ROLE_PRO
            $user->setRoles(['ROLE_PRO']);

            // On enregistre l'utilisateur dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //On déclenche l'event
            $event = new GenericEvent($user);
            $eventDispatcher->dispatch(Events::USER_REGISTERED, $event);


            /*
            //On envoie un mail
            $message = (new \Swift_Message('You Got Mail!'))
                ->setFrom($contactFormData['from'])
                ->setTo('doris.gane@free.fr')
                ->setBody($contactFormData['message'], 'text/plain' );
            $mailer->send($message);

        */


            return $this->redirectToRoute('pro');
        }

        return $this->render(
            'registerpro.html.twig',
            array('form' => $form->createView())
        );
    }
}