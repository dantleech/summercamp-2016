<?php

namespace AppBundle\Form;

use Sylius\Bundle\CoreBundle\Form\Type\CustomerType as BaseCustomerType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomerType extends BaseCustomerType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('karma', 'integer');
        parent::buildForm($builder, $options);
    }
}
