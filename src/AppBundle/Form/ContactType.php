<?php

namespace AppBundle\Form;

use AppBundle\Entity\Hobby;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
         * add
         *      - nom du champ utilisé dans la vue
         *      - type de champ : http://symfony.com/doc/current/reference/forms/types.html
         * ²    - options du champ
         *          contraintes de validation : https://symfony.com/doc/current/reference/constraints.html
         * */
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Vous n'avez pas saisi votre prénom"
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Votre prénom doit comporter 2 caractères au minimum"
                    ])
                ]
            ])
            ->add('lastname',TextType::class)
            ->add('email', EmailType::class,[
                'required' => false,
            ])
            ->add('message', TextareaType::class,[
                'required' => false,
            ])
            /*
             * EntityType : permet de relier un champ à une entité
             * class permet de définir l'entité ciblée
             * choice_label : choix de la propriété de l'entité à afficher
             *
             * choix de l'affichage
             *      expanded : affichage de plusieur champs Default : false
             *      multiple : sélection multiple           Default : false
             */
            ->add('hobbies', EntityType::class, [
                'class' => Hobby::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'constraints' => [
                    new Count([
                        'min' => 0,
                        'minMessage' => "Vous êtes trop négatif"
                        ])
                    ]
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
