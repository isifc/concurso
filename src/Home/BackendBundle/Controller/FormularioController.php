<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Formulario;
use Home\BackendBundle\Form\FormularioType;
use Home\BackendBundle\Form\FormularioFilterType;

/**
 * Formulario controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/formulario")
 */
class FormularioController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/Formulario.yml',
    );

    /**
     * Lists all Formulario entities.
     *
     * @Route("/", name="admin_formulario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new FormularioFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Formulario entity.
     *
     * @Route("/", name="admin_formulario_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Formulario:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new FormularioType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Formulario entity.
     *
     * @Route("/new", name="admin_formulario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new FormularioType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Formulario entity.
     *
     * @Route("/{id}", name="admin_formulario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Formulario entity.
     *
     * @Route("/{id}/edit", name="admin_formulario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new FormularioType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Formulario entity.
     *
     * @Route("/{id}", name="admin_formulario_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:Formulario:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new FormularioType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Formulario entity.
     *
     * @Route("/{id}", name="admin_formulario_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a Formulario entity.
     *
     * @Route("/autocomplete-forms/get-estudio_primario", name="Formulario_autocomplete_estudio_primario")
     */
    public function getAutocompleteEstudioPrimario()
    {
        $options = array(
            'repository' => "HomeBackendBundle:EstudioPrimario",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Formulario entity.
     *
     * @Route("/autocomplete-forms/get-estudio_secundario", name="Formulario_autocomplete_estudio_secundario")
     */
    public function getAutocompleteEstudioSecundario()
    {
        $options = array(
            'repository' => "HomeBackendBundle:EstudioSecundario",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Formulario entity.
     *
     * @Route("/autocomplete-forms/get-estudios_superiores", name="Formulario_autocomplete_estudios_superiores")
     */
    public function getAutocompleteEstudioSuperior()
    {
        $options = array(
            'repository' => "HomeBackendBundle:EstudioSuperior",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Formulario entity.
     *
     * @Route("/autocomplete-forms/get-cursos", name="Formulario_autocomplete_cursos")
     */
    public function getAutocompleteCursos()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Cursos",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Formulario entity.
     *
     * @Route("/autocomplete-forms/get-concursoxcargo", name="Formulario_autocomplete_concursoxcargo")
     */
    public function getAutocompleteConcursoxCargo()
    {
        $options = array(
            'repository' => "HomeBackendBundle:ConcursoxCargo",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}