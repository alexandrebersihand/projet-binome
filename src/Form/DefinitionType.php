<?php

namespace App\Form;

use App\Entity\Definition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class, array(
            'label' => $options['Nom'],
        ))
            ->add('Language', TextType::class, array(
                'label' => $options['Language'],
            ))
            ->add('Content', TextareaType::class, array(
                'label' => $options['Content'],
                'attr' => array(
                    'placeholder' => 'Inserer votre définition'
            )));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults([
            'Nom' => 'Nom de la balise:' ,
            'Language' => 'Type de langage :',
            'Content' => 'Définition :',
            'data_class' => Definition::class,
        ]);
    }
}
