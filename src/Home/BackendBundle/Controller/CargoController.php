<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Cargo;
use Home\BackendBundle\Form\CargoType;
use Home\BackendBundle\Form\CargoFilterType;

/**
 * Cargo controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/cargo")
 */
class CargoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/Cargo.yml',
    );

    /**
     * Lists all Cargo entities.
     *
     * @Route("/", name="admin_cargo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new CargoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Cargo entity.
     *
     * @Route("/", name="admin_cargo_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Cargo:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new CargoType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Cargo entity.
     *
     * @Route("/new", name="admin_cargo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new CargoType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Cargo entity.
     *
     * @Route("/{id}", name="admin_cargo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Cargo entity.
     *
     * @Route("/{id}/edit", name="admin_cargo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new CargoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Cargo entity.
     *
     * @Route("/{id}", name="admin_cargo_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:Cargo:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new CargoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Cargo entity.
     *
     * @Route("/{id}", name="admin_cargo_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a Cargo entity.
     *
     * @Route("/autocomplete-forms/get-concursoxcargos", name="Cargo_autocomplete_concursoxcargos")
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