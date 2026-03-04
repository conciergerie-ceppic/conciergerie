<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('email')
            ->add('password', PasswordType::class)
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank(
                        message: 'Entrez un mot de passe',
                    ),
                    new Length(
                        min: 6,
                        minMessage: 'Votre mot de passe doit comporter au moins {{ limit }} caractères.',
                        // max length allowed by Symfony for security reasons
                        max: 4096,
                    ),
                ],
            ])
            ->add('phone')
            ->add('address')
            ->add('role', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Membre' => 'ROLE_USER',
                    'Partenaire' => 'ROLE_PARTNER',
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => false,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue(
                        message: "Accepter les conditions d'utilisations.",
                    ),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
