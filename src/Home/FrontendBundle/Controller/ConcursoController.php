<?php

namespace Home\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Disposicion controller.
 * @author Aguirre Facundo <isifc.facu@gmail.com>
 *
 * @Route("/index")
 */
class ConcursoController extends Controller
{

    /**
     * Lists all Disposicion entities.
     *
     * @Route("/", name="index")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function indexAction()
    {
       return null;
    }


}