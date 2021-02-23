<?php

namespace App\Form;

use App\Entity\Topic;
use Symfony\Bundle\MakerBundle\Doctrine\RelationOneToMany;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, 'topic title ..'])
            ->add('slug', TextType::class, 'shorten name'])
            ->add('content', TextareaType::class, 'give it the core!'])
            ->add('description', TextType::class, 'short description for users'])
            ->add('created_at')
            ->add('updated_at')
            ->add('category', RelationOneToMany::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Topic::class,
        ]);
    }
}