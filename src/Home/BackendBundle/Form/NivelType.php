<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * NivelType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class NivelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('denominacion')
            ->add('estudios_superiores', 'select2', array(
                'class' => 'Home\BackendBundle\Entity\EstudioSuperior',
                'url'   => 'Nivel_autocomplete_estudios_superiores',
                'configs' => array(
                    'multiple' => true,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Nivel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_nivel';
    }
}
