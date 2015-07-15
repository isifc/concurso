<?php

namespace Home\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
     * Lists all ConcursoxCargo entities.
     *
     * @Route("/", name="admin_concursoxcargo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $queryBuilder,
            $this->get('request')->query->get('page', 1),
            (isset($this->container->parameters['knp_paginator.page_range'])) ? $this->container->parameters['knp_paginator.page_range'] : 10
        );

        return array(
            'entities'   => $pagination,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
    * Process filter request.
    *
    * @return array
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createFilterForm();
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('HomeBackendBundle:ConcursoxCargo')
            ->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
        ;
        // Bind values from the request
        $filterForm->handleRequest($request);
        // Reset filter
        if ($filterForm->get('reset')->isClicked()) {
            $session->remove('ConcursoxCargoControllerFilter');
            $filterForm = $this->createFilterForm();
        }

        // Filter action
        if ($filterForm->get('filter')->isClicked()) {
            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('ConcursoxCargoControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('ConcursoxCargoControllerFilter')) {
                $filterData = $session->get('ConcursoxCargoControllerFilter');
                $filterForm = $this->createFilterForm($filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }
    /**
    * Create filter form.
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createFilterForm($filterData = null)
    {
        $form = $this->createForm(new ConcursoxCargoFilterType(), $filterData, array(
            'action' => $this->generateUrl('admin_concursoxcargo'),
            'method' => 'GET',
        ));

        $form
            ->add('filter', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.index.filter',
                'attr'               => array('class' => 'btn btn-success col-lg-1'),
            ))
            ->add('reset', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.index.reset',
                'attr'               => array('class' => 'btn btn-danger col-lg-1 col-lg-offset-1'),
            ))
        ;

        return $form;
    }
    /**
     * Creates a new ConcursoxCargo entity.
     *
     * @Route("/", name="admin_concursoxcargo_create")
     * @Method("POST")
     * @Template("HomeBackendBundle:ConcursoxCargo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ConcursoxCargo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            $nextAction = $form->get('saveAndAdd')->isClicked()
                    ? $this->generateUrl('admin_concursoxcargo_new')
                    : $this->generateUrl('admin_concursoxcargo_show', array('id' => $entity->getId()));
            return $this->redirect($nextAction);

        }
        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ConcursoxCargo entity.
    *
    * @param ConcursoxCargo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ConcursoxCargo $entity)
    {
        $form = $this->createForm(new ConcursoxCargoType(), $entity, array(
            'action' => $this->generateUrl('admin_concursoxcargo_create'),
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
     * Displays a form to create a new ConcursoxCargo entity.
     *
     * @Route("/new", name="admin_concursoxcargo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConcursoxCargo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeBackendBundle:ConcursoxCargo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcursoxCargo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);


         

       
        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            //'entities'   => $pagination,
            //'filterForm' => $filterForm->createView(),
        );
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeBackendBundle:ConcursoxCargo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcursoxCargo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ConcursoxCargo entity.
    *
    * @param ConcursoxCargo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConcursoxCargo $entity)
    {
        $form = $this->createForm(new ConcursoxCargoType(), $entity, array(
            'action' => $this->generateUrl('admin_concursoxcargo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
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
     * Edits an existing ConcursoxCargo entity.
     *
     * @Route("/{id}", name="admin_concursoxcargo_update")
     * @Method("PUT")
     * @Template("HomeBackendBundle:ConcursoxCargo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeBackendBundle:ConcursoxCargo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcursoxCargo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $nextAction = $editForm->get('saveAndAdd')->isClicked()
                        ? $this->generateUrl('admin_concursoxcargo_new')
                        : $this->generateUrl('admin_concursoxcargo_show', array('id' => $id));
            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.update.error');

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ConcursoxCargo entity.
     *
     * @Route("/{id}", name="admin_concursoxcargo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HomeBackendBundle:ConcursoxCargo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConcursoxCargo entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        }

        return $this->redirect($this->generateUrl('admin_concursoxcargo'));
    }

    /**
     * Creates a form to delete a ConcursoxCargo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        $mensaje = $this->get('translator')->trans('views.recordactions.confirm', array(), 'MWSimpleCrudGeneratorBundle');
        $onclick = 'return confirm("'.$mensaje.'");';
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_concursoxcargo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.recordactions.delete',
                'attr'               => array(
                    'class'   => 'btn btn-danger col-lg-11',
                    'onclick' => $onclick,
                )
            ))
            ->getForm()
        ;
    }
}