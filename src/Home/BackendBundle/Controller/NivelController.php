<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Nivel;
use Home\BackendBundle\Form\NivelType;
use Home\BackendBundle\Form\NivelFilterType;

/**
 * Nivel controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/nivel")
 */
class NivelController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/Nivel.yml',
    );

    /**
     * Lists all Nivel entities.
     *
     * @Route("/", name="admin_nivel")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new NivelFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Nivel entity.
     *
     * @Route("/", name="admin_nivel_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Nivel:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new NivelType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Nivel entity.
     *
     * @Route("/new", name="admin_nivel_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new NivelType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Nivel entity.
     *
     * @Route("/{id}", name="admin_nivel_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Nivel entity.
     *
     * @Route("/{id}/edit", name="admin_nivel_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new NivelType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Nivel entity.
     *
     * @Route("/{id}", name="admin_nivel_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:Nivel:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new NivelType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Nivel entity.
     *
     * @Route("/{id}", name="admin_nivel_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Autocomplete a Nivel entity.
     *
     * @Route("/autocomplete-forms/get-estudios_superiores", name="Nivel_autocomplete_estudios_superiores")
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
}