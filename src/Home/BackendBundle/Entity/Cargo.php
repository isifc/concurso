<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Cargo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\CargoRepository")
 */
class Cargo
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
     * @ORM\Column(name="categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="apartado", type="string", length=100)
     */
    private $apartado;

    /**
     * @var integer
     *
     * @ORM\Column(name="escalafon", type="integer")
     */
    private $escalafon;

    

    /**
     * @var integer
     *
     * @ORM\Column(name="funcion", type="integer")
     */
    private $funcion;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion", type="string", length=255)
     */
    private $denominacion;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo", type="string", length=100)
     */
    private $grupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUOF", type="integer")
     */
    private $cUOF;

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
     * Set categoria
     *
     * @param string $categoria
     * @return Cargo
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set apartado
     *
     * @param string $apartado
     * @return Cargo
     */
    public function setApartado($apartado)
    {
        $this->apartado = $apartado;

        return $this;
    }

    /**
     * Get apartado
     *
     * @return string 
     */
    public function getApartado()
    {
        return $this->apartado;
    }

    /**
     * Set escalafon
     *
     * @param integer $escalafon
     * @return Cargo
     */
    public function setEscalafon($escalafon)
    {
        $this->escalafon = $escalafon;

        return $this;
    }

    /**
     * Get escalafon
     *
     * @return integer 
     */
    public function getEscalafon()
    {
        return $this->escalafon;
    }

    /**
     * Set cargoId
     *
     * @param integer $cargoId
     * @return Cargo
     */
    public function setCargoId($cargoId)
    {
        $this->cargoId = $cargoId;

        return $this;
    }

    

    /**
     * Get funcion
     *
     * @return integer 
     */
    public function getFuncion()
    {
        return $this->funcion;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     * @return Cargo
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set grupo
     *
     * @param string $grupo
     * @return Cargo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return string 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set cUOF
     *
     * @param integer $cUOF
     * @return Cargo
     */
    public function setCUOF($cUOF)
    {
        $this->cUOF = $cUOF;

        return $this;
    }

    /**
     * Get cUOF
     *
     * @return integer 
     */
    public function getCUOF()
    {
        return $this->cUOF;
    }

    /**
     * Set funcion
     *
     * @param integer $funcion
     * @return Cargo
     */
    public function setFuncion($funcion)
    {
        $this->funcion = $funcion;

        return $this;
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
     * @return Cargo
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

    public function __toString(){
        return (string)$this->getDenominacion();
    }
}
