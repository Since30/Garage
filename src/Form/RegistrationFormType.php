<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\Emailtype;
use Symfony\Component\Form\Extension\Core\Type\Texttype;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ->add('firstname', TextType::class, [
            'label' => 'Prénom',
            'attr' => [
                'class' => 'form-control'
            ]
])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ->add('address', TextType::class, [
            'label' => 'Adresse',
            'attr' => [
                'class' => 'form-control'
            ]
        ])

        ->add('zipcode', TextType::class, [
            'label' => 'Code postal',
            'attr' => [
                'class' => 'form-control'
            ]
        ])
        ->add('city', TextType::class, [
            'label' => 'Ville',
            'attr' => [
                'class' => 'form-control'
            ]
        ])


            ->add('RGPDconsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous acceptez les termes.',
                    ]),
                ],
                'label' => 'J\'accepte les termes et conditions',
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                    'class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                "label" => "Mot de passe"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
