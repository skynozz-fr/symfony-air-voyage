<?php

namespace App\Form;

use App\Entity\Vol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class VolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('horraireDepart', null, [
                'label' => 'Horaire de départ',
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('villeDepart', TextType::class, [
                'label' => 'Ville de départ',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z\s]*$/',
                        'message' => 'Le nom de la ville ne peut contenir que des lettres et des espaces.',
                    ]),
                ],
            ])
            ->add('horraireArrivee', null, [
                'label' => 'Horaire d\'arrivée',
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('villeArrivee', TextType::class, [
                'label' => 'Ville d\'arrivée',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z\s]*$/',
                        'message' => 'Le nom de la ville ne peut contenir que des lettres et des espaces.',
                    ]),
                ],
            ])
            ->add('prix', MoneyType::class, [
                'label' => 'Prix du billet',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Positive([
                        'message' => 'Le prix doit être un nombre positif.',
                    ]),
                    new Assert\GreaterThan([
                        'value' => 0,
                        'message' => 'Le prix doit être supérieur à zéro.',
                    ]),
                ],
            ])
            ->add('etiquetteReduction')
            ->add('nombrePlaceAReserver', IntegerType::class, [
                'label' => 'Nombre de places à réserver',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Positive([
                        'message' => 'Le nombre de places à réserver doit être un entier positif.',
                    ]),
                    new Assert\GreaterThan([
                        'value' => 0,
                        'message' => 'Le nombre de places à réserver doit être supérieur à zéro.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vol::class,
        ]);
    }
}