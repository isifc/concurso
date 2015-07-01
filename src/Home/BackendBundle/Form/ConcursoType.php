<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ConcursoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class ConcursoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoConcurso')
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('dectreto')
            ->add('cantidadCargo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Concurso'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_concurso';
    }
}
