<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' =>  false,
                'attr' => ['placeholder' => 'your_name'],
            ))
            ->add('email', EmailType::class, array(
                'label' =>  false,
                'attr' => ['placeholder' => 'your_email'],
            ))
            ->add('subject', TextType::class, array(
                'label' =>  false,
                'attr' => ['placeholder' => 'subject'],
            ))
            ->add('message', TextareaType::class, array(
                'label' =>  false,
                'attr' => ['placeholder' => 'your _message'],
            ))
            ->add('send', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Message::class
        ));
    }
}
