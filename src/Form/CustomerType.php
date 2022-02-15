<?php

namespace App\Form;

use App\Entity\Customers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom :'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom :'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail :'
            ])
            ->add('adress', TextType::class, [
                'label' => 'Votre adresse :'
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone :'
            ])
            ->add('button', SubmitType::class, [
                'label' => 'passer au paiement'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customers::class,
        ]);
    }
}
