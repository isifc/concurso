<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cursos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\CursosRepository")
 */
class Cursos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="institucion", type="string", length=255)
     */
    private $institucion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_curso", type="string", length=255)
     */
    private $nombreCurso;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_hs", type="integer")
     */
    private $cantidadHs;


    /**
    * @ORM\ManyToOne(targetEntity="Formulario", inversedBy="cursos" ,fetch="EAGER")
    */
     private $formulario;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set institucion
     *
     * @param string $institucion
     * @return Cursos
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;

        return $this;
    }

    /**
     * Get institucion
     *
     * @return string 
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * Set nombreCurso
     *
     * @param string $nombreCurso
     * @return Cursos
     */
    public function setNombreCurso($nombreCurso)
    {
        $this->nombreCurso = $nombreCurso;

        return $this;
    }

    /**
     * Get nombreCurso
     *
     * @return string 
     */
    public function getNombreCurso()
    {
        return $this->nombreCurso;
    }

    /**
     * Set cantidadHs
     *
     * @param integer $cantidadHs
     * @return Cursos
     */
    public function setCantidadHs($cantidadHs)
    {
        $this->cantidadHs = $cantidadHs;

        return $this;
    }

    /**
     * Get cantidadHs
     *
     * @return integer 
     */
    public function getCantidadHs()
    {
        return $this->cantidadHs;
    }

    /**
     * Set formulario
     *
     * @param \Home\BackendBundle\Entity\Formulario $formulario
     * @return Cursos
     */
    public function setFormulario(\Home\BackendBundle\Entity\Formulario $formulario = null)
    {
        $this->formulario = $formulario;

        return $this;
    }

    /**
     * Get formulario
     *
     * @return \Home\BackendBundle\Entity\Formulario 
     */
    public function getFormulario()
    {
        return $this->formulario;
    }
}
