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
        $builder->add('publishedAt', 'date');
        $builder->add('translations', 'sylius_translations', [
            'type' => PostTranslationType::class
        ]);
    }
}
