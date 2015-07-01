<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\ConcursoxCargo;
use Home\BackendBundle\Form\ConcursoxCargoType;
use Home\BackendBundle\Form\ConcursoxCargoFilterType;

/**
 * ConcursoxCargo controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/concursoxcargo")
 */
class ConcursoxCargoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/ConcursoxCargo.yml',
    );

    /**
     * Lists all ConcursoxCargo entities.
     *
     * @Route("/", name="admin_concursoxcargo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new ConcursoxCargoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new ConcursoxCargo entity.
     *
     * @Route("/", name="admin_concursoxcargo_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:ConcursoxCargo:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new ConcursoxCargoType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new ConcursoxCargo entity.
     *
     * @Route("/new", name="admin_concursoxcargo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new ConcursoxCargoType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a ConcursoxCargo entity.
     *
     * @Route("/{id}", name="admin_concursoxcargo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing ConcursoxCargo entity.
     *
     * @Route("/{id}/edit", name="admin_concursoxcargo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new ConcursoxCargoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing ConcursoxCargo entity.
     *
     * @Route("/{id}", name="admin_concursoxcargo_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:ConcursoxCargo:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new ConcursoxCargoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a ConcursoxCargo entity.
     *
     * @Route("/{id}", name="admin_concursoxcargo_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a ConcursoxCargo entity.
     *
     * @Route("/autocomplete-forms/get-concurso", name="ConcursoxCargo_autocomplete_concurso")
     */
    public function getAutocompleteConcurso()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Concurso",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a ConcursoxCargo entity.
     *
     * @Route("/autocomplete-forms/get-cargo", name="ConcursoxCargo_autocomplete_cargo")
     */
    public function getAutocompleteCargo()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Cargo",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a ConcursoxCargo entity.
     *
     * @Route("/autocomplete-forms/get-oficina", name="ConcursoxCargo_autocomplete_oficina")
     */
    public function getAutocompleteOficina()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Oficina",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a ConcursoxCargo entity.
     *
     * @Route("/autocomplete-forms/get-formularios", name="ConcursoxCargo_autocomplete_formularios")
     */
    public function getAutocompleteFormulario()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Formulario",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}