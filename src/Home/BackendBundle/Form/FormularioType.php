<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * FormularioType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class FormularioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('estado')
            //->add('nroAleatorio')
            //->add('entregoCarpeta')
            //->add('fechaInscripcion')
            ->add('apellido')
            ->add('nombre')
            ->add('dNI')
            ->add('cUIL')
            ->add('fechaNacimiento')
            ->add('provincia')
            ->add('localidad')
            ->add('direccion')
            ->add('codigoPostal')
            ->add('mail')
            ->add('telefono')
            ->add('telefonoLaboral')
            ->add('celular')
            ->add('estudio_primario',new EstudioPrimarioType(), array(
                                    'attr' => array('class' => 'well')))
            ->add('estudio_secundario',new EstudioSecundarioType(), array(
                                    'attr' => array('class' => 'well')))
            ->add('cursos','collection', 
                array(
                    'type' => new CursosType(),
                    'allow_delete'   => true,
                    'allow_add'      => true,
                    'by_reference'   => false, ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Formulario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_formulario';
    }
}
