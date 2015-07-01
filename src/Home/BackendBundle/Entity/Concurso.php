<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Concurso
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\ConcursoRepository")
 */
class Concurso
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
     * @ORM\Column(name="tipo_concurso", type="string", length=255)
     */
    private $tipoConcurso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="dectreto", type="string", length=255)
     */
    private $dectreto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_cargo", type="integer")
     */
    private $cantidadCargo;

    /**
    * @ORM\OneToMany(targetEntity="ConcursoxCargo", mappedBy="concurso", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $concursoxcargos;

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
     * Set tipoConcurso
     *
     * @param string $tipoConcurso
     * @return Concurso
     */
    public function setTipoConcurso($tipoConcurso)
    {
        $this->tipoConcurso = $tipoConcurso;

        return $this;
    }

    /**
     * Get tipoConcurso
     *
     * @return string 
     */
    public function getTipoConcurso()
    {
        return $this->tipoConcurso;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Concurso
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Concurso
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set dectreto
     *
     * @param string $dectreto
     * @return Concurso
     */
    public function setDectreto($dectreto)
    {
        $this->dectreto = $dectreto;

        return $this;
    }

    /**
     * Get dectreto
     *
     * @return string 
     */
    public function getDectreto()
    {
        return $this->dectreto;
    }

    /**
     * Set cantidadCargo
     *
     * @param integer $cantidadCargo
     * @return Concurso
     */
    public function setCantidadCargo($cantidadCargo)
    {
        $this->cantidadCargo = $cantidadCargo;

        return $this;
    }

    /**
     * Get cantidadCargo
     *
     * @return integer 
     */
    public function getCantidadCargo()
    {
        return $this->cantidadCargo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->concursoxcargos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add concursoxcargos
     *
     * @param \Home\BackendBundle\Entity\ConcursoxCargo $concursoxcargos
     * @return Concurso
     */
    public function addConcursoxcargo(\Home\BackendBundle\Entity\ConcursoxCargo $concursoxcargos)
    {
        $this->concursoxcargos[] = $concursoxcargos;

        return $this;
    }

    /**
     * Remove concursoxcargos
     *
     * @param \Home\BackendBundle\Entity\ConcursoxCargo $concursoxcargos
     */
    public function removeConcursoxcargo(\Home\BackendBundle\Entity\ConcursoxCargo $concursoxcargos)
    {
        $this->concursoxcargos->removeElement($concursoxcargos);
    }

    /**
     * Get concursoxcargos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConcursoxcargos()
    {
        return $this->concursoxcargos;
    }
}
