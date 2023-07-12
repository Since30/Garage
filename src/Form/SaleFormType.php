<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SaleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('brand', TextType::class, [
                'label' => 'Marque',
                'attr' => [
                    'placeholder' => 'Marque',
                    'class' => 'form-control'
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'choices' => [
                    'Citadine' => 'Citadine',
                    'Berline' => 'Berline',
                    'SUV' => 'SUV',
                    'Monospace' => 'Monospace',
                    'Coupé' => 'Coupé',
                    'Cabriolet' => 'Cabriolet',
                    'Utilitaire' => 'Utilitaire',
                    'Pick-up' => 'Pick-up',
                    '4x4' => '4x4',
                    'Break' => 'Break',
                    'Crossover' => 'Crossover',
                    'Hybride' => 'Hybride',
                    'Electrique' => 'Electrique',
                    'Autre' => 'Autre',
                ],
                'attr' => [
                    'placeholder' => 'Type',
                    'class' => 'form-control'
                ]
            ])

            ->add('gearboxType', ChoiceType::class, [
                'label' => 'Type de boite de vitesse',
                'choices' => [
                    'Manuelle' => 'Manuelle',
                    'Automatique' => 'Automatique',
                    'Séquentielle' => 'Séquentielle',
                    'Autre' => 'Autre',
                ],
                'attr' => [
                    'placeholder' => 'Type de boite de vitesse',
                    'class' => 'form-control'
                ]
            ])

            ->add('door', ChoiceType::class, [
                'label' => 'Nombre de porte',
                'choices' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ],
                'attr' => [
                    'placeholder' => 'Nombre de porte',
                    'class' => 'form-control'
                ]
            ])

            ->add('placeNumber', ChoiceType::class, [
                'label' => 'Nombre de place',
                'choices' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ],
                'attr' => [
                    'placeholder' => 'Nombre de place',
                    'class' => 'form-control'
                ]
            ])

            ->add('km', TextType::class, [
                'label' => 'Kilométrage',
                'attr' => [
                    'placeholder' => 'Kilométrage',
                    'class' => 'form-control'
                ]
            ])

            ->add('price', NumberType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix',
                    'class' => 'form-control'
                ]
            ])

            ->add('year', DateType::class, [
                'label' => 'Année',
                'input' => 'datetime_immutable',
                'widget' => 'choice',

                'attr' => [
                    'placeholder' => 'Année',
                    'class' => 'form-control'

                ]
            ])

            ->add('imageCar', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,

                'attr' => [
                    'placeholder' => 'Image',
                    'class' => 'form-control'
                ]
            ])

            ->add('createdAt', TimeType::class, [
                'label' => 'Date de création',
                'input' => 'datetime_immutable',
                'widget' => 'choice',

                'attr' => [
                    'placeholder' => 'Date de création',
                    'class' => 'form-control'

                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])

            ->getForm()


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}