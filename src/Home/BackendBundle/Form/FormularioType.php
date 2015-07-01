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
            ->add('estado')
            ->add('nroAleatorio')
            ->add('entregoCarpeta')
            ->add('fechaInscripcion', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Fechainscripcion',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'both',
            ))
            ->add('apellido')
            ->add('nombre')
            ->add('dNI')
            ->add('cUIL')
            ->add('fechaNacimiento', 'bootstrapdatetime', array(
                'required'   => true,
                'label'      => 'Fechanacimiento',
                'label_attr' => array(
                    'class' => 'col-lg-2 col-md-2 col-sm-2',
                ),
                'widget_type' => 'date',
            ))
            ->add('provincia')
            ->add('localidad')
            ->add('direccion')
            ->add('codigoPostal')
            ->add('mail')
            ->add('telefono')
            ->add('telefonoLaboral')
            ->add('celular')
            ->add('estudio_primario', 'select2', array(
                'class' => 'Home\BackendBundle\Entity\EstudioPrimario',
                'url'   => 'Formulario_autocomplete_estudio_primario',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('estudio_secundario', 'select2', array(
                'class' => 'Home\BackendBundle\Entity\EstudioSecundario',
                'url'   => 'Formulario_autocomplete_estudio_secundario',
                'configs' => array(
                    'multiple' => false,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('estudios_superiores', 'select2', array(
                'class' => 'Home\BackendBundle\Entity\EstudioSuperior',
                'url'   => 'Formulario_autocomplete_estudios_superiores',
                'configs' => array(
                    'multiple' => true,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('cursos', 'select2', array(
                'class' => 'Home\BackendBundle\Entity\Cursos',
                'url'   => 'Formulario_autocomplete_cursos',
                'configs' => array(
                    'multiple' => true,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            ->add('concursoxcargo', 'select2', array(
                'class' => 'Home\BackendBundle\Entity\ConcursoxCargo',
                'url'   => 'Formulario_autocomplete_concursoxcargo',
                'configs' => array(
                    'multiple' => false,//required true or false
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
