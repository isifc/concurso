<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * EstudioSecundario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\EstudioSecundarioRepository")
 */
class EstudioSecundario
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
    * @ORM\OneToOne(targetEntity="Formulario", mappedBy="estudio_secundario" ,fetch="EAGER")
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
     * @return EstudioSecundario
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
     * @return EstudioSecundario
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
     * Set completoç
     *
     * @param boolean $completoç
     * @return EstudioSecundario
     */
    public function setCompletoç($completoç)
    {
        $this->completoç = $completoç;

        return $this;
    }

    /**
     * Get completoç
     *
     * @return boolean 
     */
    public function getCompletoç()
    {
        return $this->completoç;
    }

    /**
     * Set completo
     *
     * @param boolean $completo
     * @return EstudioSecundario
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
     * Set formulario
     *
     * @param \Home\BackendBundle\Entity\Formulario $formulario
     * @return EstudioSecundario
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
