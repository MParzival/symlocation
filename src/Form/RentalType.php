<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\Rental;
use App\Entity\Vehicle;
use Doctrine\DBAL\Types\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('conducteur', EntityType::class, [
                'choice_label' => 'firstname',
                'class' => Driver::class
            ])
            ->add('vehicule', EntityType::class, [
                'choice_label' => 'model',
                'class' => Vehicle::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rental::class,
        ]);
    }
}
