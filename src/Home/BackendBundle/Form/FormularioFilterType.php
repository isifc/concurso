<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * FormularioFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class FormularioFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado', 'filter_choice', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('nroAleatorio', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('entregoCarpeta', 'filter_choice', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('fechaInscripcion', 'filter_date_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('apellido', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('nombre', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('dNI', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('cUIL', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('fechaNacimiento', 'filter_date_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('provincia', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('localidad', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('direccion', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('codigoPostal', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('mail', 'filter_text_like', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('telefono', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('telefonoLaboral', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('celular', 'filter_number_range', array(
                'attr'=> array('class'=>'form-control')
            ))
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ((array)$event->getForm()->getData() as $data) {
                if ( is_array($data)) {
                    foreach ($data as $subData) {
                        if (!empty($subData)) {
                            return;
                        }
                    }
                } else {
                    if (!empty($data)) {
                        return;
                    }    
                }
            }
            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_SUBMIT, $listener);
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
        return 'home_backendbundle_formulariofiltertype';
    }
}
