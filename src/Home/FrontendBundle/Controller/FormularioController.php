<?php

namespace Home\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Formulario;
use Home\BackendBundle\Entity\ConcursoxCargo;
use Home\BackendBundle\Entity\Cargo;
use Home\BackendBundle\Entity\Oficina;
use Home\BackendBundle\Form\FormularioType;
use Home\BackendBundle\Form\FormularioFilterType;

/**
 * Formulario controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/formulario")
 */
class FormularioController extends Controller
{

    
    /**
     * Creates a new Formulario entity.
     *
     * @Route("/", name="formulario_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Formulario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Formulario();
       
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setEstado(false);
            $entity->setNroAleatorio(rand(5,5));
            $entity->setEntregoCarpeta(false);
            //$entity->setFechaInscripcion(Datetime(('Y-m-d')));
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

           
            return $this->redirect($this->generateUrl('concurso'));

        }
        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Formulario entity.
    *
    * @param Formulario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Formulario $entity)
    {
        $form = $this->createForm(new FormularioType(), $entity, array(
            'action' => $this->generateUrl('formulario_create'),
            'method' => 'POST',
        ));

        $form
            ->add(
                'save', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.new.save',
                'attr'               => array('class' => 'btn btn-success col-lg-2')
                )
            )
            ->add(
                'saveAndAdd', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.new.saveAndAdd',
                'attr'               => array('class' => 'btn btn-primary col-lg-2 col-lg-offset-1')
                )
            )
        ;

        return $form;
    }

    /**
     * Displays a form to create a new Formulario entity.
     *
     * @Route("/new/{id}", name="formulario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Formulario();
        $form   = $this->createCreateForm($entity);
        $concursoxcargo = $em->getRepository('HomeBackendBundle:ConcursoxCargo')->find($id);
       

        return array(
            'entity' => $entity,
            'concursoxcargo'=>$concursoxcargo,
            'form'   => $form->createView(),
        );
    }

   
    
}