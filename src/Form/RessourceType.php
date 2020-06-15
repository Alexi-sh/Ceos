<?php

namespace App\Form;

use App\Entity\Ressource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RessourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type'
                // 'type',
                // RessourceType::class,
                // array(
                //     'Devoir' => 'devoir_a_rendre',
                //     'Cours' => 'cours'
                // )

            )
            ->add('Titre')
            ->add('Description')
            ->add('link')
            ->add('date_limite');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
}