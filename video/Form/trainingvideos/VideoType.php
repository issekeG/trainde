<?php

namespace App\Form\trainingvideos;

use App\Entity\trainingvideos\Category;
use App\Entity\trainingvideos\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Title',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('embedVideoLink', null, [
                'label' => 'Embed link',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description',null, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Category',
                'attr' => ['class' => 'form-select'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}

