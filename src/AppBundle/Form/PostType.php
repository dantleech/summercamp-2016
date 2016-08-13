<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\Post;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;

class PostType extends AbstractResourceType
{
    public function __construct()
    {
        parent::__construct(Post::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', 'sylius_translations', [
            'type' => PostTranslationType::class
        ]);
        $builder->add('categories', 'sylius_taxon_choice', [
            'label' => 'Categories',
            'root' => 'blog',
            'multiple' => true,
            'expanded' => true,
        ]);
    }
}
