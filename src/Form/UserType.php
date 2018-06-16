<?php
// /src/Form/UserType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre', ChoiceType::class, array('choices' => array('Mademoiselle' => 'Mademoiselle' ,'Madame' => 'Madame' , 'Monsieur' => 'Monsieur' , ),))
            ->add('fullName', TextType::class, array('label' =>'Nom'))
            ->add('lastname', TextType::class, array('label' => 'Prénom'))
            ->add('birthday', BirthdayType::class, array('label' =>'Date de naissance'))
            ->add('email', EmailType::class, array('label' => 'Email'))
            ->add('Tel', TelType::class, array('label' => 'Téléphone'))
            ->add('username', TextType::class, array('label' => 'Pseudo'))
            ->add('adress', TextType::class, array('label' => 'Adresse'))
            ->add('zip', NumberType::class , array('label' => 'Code Postal'))
            ->add('ville', TextType::class, array('label' => 'Ville'))
            ->add('newletter', CheckboxType::class, array('label' => 'Inscription à la newsletter', 'required' => false,))
            ->add('roles', CollectionType::class, array('entry_type' =>  ChoiceType::class,
              'entry_options' =>  array( 'choices' => array (
                  'Particulier' => 'ROLE_USER' , 'Professionnel' => 'ROLE_PRO' ,),),))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de Passe'),
                'second_options' => array('label' => 'Confirmer le mot de passe'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}