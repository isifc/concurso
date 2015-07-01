<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Concurso;
use Home\BackendBundle\Form\ConcursoType;
use Home\BackendBundle\Form\ConcursoFilterType;

/**
 * Concurso controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/concurso")
 */
class ConcursoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/Concurso.yml',
    );

    /**
     * Lists all Concurso entities.
     *
     * @Route("/", name="admin_concurso")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new ConcursoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Concurso entity.
     *
     * @Route("/", name="admin_concurso_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Concurso:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new ConcursoType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Concurso entity.
     *
     * @Route("/new", name="admin_concurso_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new ConcursoType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Concurso entity.
     *
     * @Route("/{id}", name="admin_concurso_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Concurso entity.
     *
     * @Route("/{id}/edit", name="admin_concurso_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new ConcursoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Concurso entity.
     *
     * @Route("/{id}", name="admin_concurso_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:Concurso:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new ConcursoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Concurso entity.
     *
     * @Route("/{id}", name="admin_concurso_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a Concurso entity.
     *
     * @Route("/autocomplete-forms/get-concursoxcargos", name="Concurso_autocomplete_concursoxcargos")
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