<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',null, [               
                'empty_data' => ''
            ])
            ->add('lastName',null, [               
                'empty_data' => ''
            ])
            ->add('email',null, [               
                'empty_data' => ''
            ])
            ->add('password',null, [               
                'empty_data' => ''
            ])       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
