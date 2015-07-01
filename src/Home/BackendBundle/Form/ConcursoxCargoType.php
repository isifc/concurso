<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ConcursoxCargoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class ConcursoxCargoType extends AbstractType
{
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\ConcursoxCargo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_concursoxcargo';
    }
}
