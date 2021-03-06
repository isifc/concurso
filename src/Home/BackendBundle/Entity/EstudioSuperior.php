<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * EstudioSuperior
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EstudioSuperior
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="completo", type="boolean")
     */
    private $completo;


    /**
    * @ORM\ManyToOne(targetEntity="Nivel", inversedBy="estudios_superiores" ,fetch="EAGER")
    * @Assert\NotNull( message= "No puede estar vacio")
    */
    private $nivel;

    /**
    * @ORM\ManyToOne(targetEntity="Formulario", inversedBy="estudios_superiores" ,fetch="EAGER")
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
     * @return EstudioSuperior
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
     * Set titulo
     *
     * @param string $titulo
     * @return EstudioSuperior
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set completo
     *
     * @param boolean $completo
     * @return EstudioSuperior
     */
    public function setCompleto($completo)
    {
        $this->completo = $completo;

        return $this;
    }

    /**
     * Get completo
     *
     * @return boolean 
     */
    public function getCompleto()
    {
        return $this->completo;
    }

    /**
     * Set nivel
     *
     * @param \Home\BackendBundle\Entity\Nivel $nivel
     * @return EstudioSuperior
     */
    public function setNivel(\Home\BackendBundle\Entity\Nivel $nivel = null)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return \Home\BackendBundle\Entity\Nivel 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set formulario
     *
     * @param \Home\BackendBundle\Entity\Formulario $formulario
     * @return EstudioSuperior
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
