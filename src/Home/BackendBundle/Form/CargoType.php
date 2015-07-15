<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * CargoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class CargoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria')
            ->add('apartado')
            ->add('escalafon')
            ->add('funcion')
            ->add('denominacion')
            ->add('grupo')
            ->add('cUOF')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Cargo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_cargo';
    }
}
