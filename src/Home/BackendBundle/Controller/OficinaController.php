<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Oficina;
use Home\BackendBundle\Form\OficinaType;
use Home\BackendBundle\Form\OficinaFilterType;

/**
 * Oficina controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/oficina")
 */
class OficinaController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/Oficina.yml',
    );

    /**
     * Lists all Oficina entities.
     *
     * @Route("/", name="admin_oficina")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new OficinaFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Oficina entity.
     *
     * @Route("/", name="admin_oficina_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Oficina:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new OficinaType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Oficina entity.
     *
     * @Route("/new", name="admin_oficina_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new OficinaType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Oficina entity.
     *
     * @Route("/{id}", name="admin_oficina_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Oficina entity.
     *
     * @Route("/{id}/edit", name="admin_oficina_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new OficinaType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Oficina entity.
     *
     * @Route("/{id}", name="admin_oficina_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:Oficina:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new OficinaType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Oficina entity.
     *
     * @Route("/{id}", name="admin_oficina_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a Oficina entity.
     *
     * @Route("/autocomplete-forms/get-jurisdiccion", name="Oficina_autocomplete_jurisdiccion")
     */
    public function getAutocompleteJurisdiccion()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Jurisdiccion",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Oficina entity.
     *
     * @Route("/autocomplete-forms/get-concursoxcargos", name="Oficina_autocomplete_concursoxcargos")
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

    /**
     * Autocomplete a Oficina entity.
     *
     * @Route("/autocomplete-forms/get-ambito", name="Oficina_autocomplete_ambito")
     */
    public function getAutocompleteAmbito()
    {
        $options = array(
            'repository' => "HomeBackendBundle:Ambito",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}