<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Jurisdiccion;
use Home\BackendBundle\Form\JurisdiccionType;
use Home\BackendBundle\Form\JurisdiccionFilterType;

/**
 * Jurisdiccion controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/jurisdiccion")
 */
class JurisdiccionController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'Home/BackendBundle/Resources/config/Jurisdiccion.yml',
    );

    /**
     * Lists all Jurisdiccion entities.
     *
     * @Route("/", name="admin_jurisdiccion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new JurisdiccionFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Jurisdiccion entity.
     *
     * @Route("/", name="admin_jurisdiccion_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:Jurisdiccion:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new JurisdiccionType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Jurisdiccion entity.
     *
     * @Route("/new", name="admin_jurisdiccion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new JurisdiccionType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Jurisdiccion entity.
     *
     * @Route("/{id}", name="admin_jurisdiccion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Jurisdiccion entity.
     *
     * @Route("/{id}/edit", name="admin_jurisdiccion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new JurisdiccionType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Jurisdiccion entity.
     *
     * @Route("/{id}", name="admin_jurisdiccion_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:Jurisdiccion:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new JurisdiccionType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Jurisdiccion entity.
     *
     * @Route("/{id}", name="admin_jurisdiccion_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }
}