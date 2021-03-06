<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Formulario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\FormularioRepository")
 */
class Formulario
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
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_aleatorio", type="integer")
     */
    private $nroAleatorio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="entrego_carpeta", type="boolean")
     */
    private $entregoCarpeta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inscripcion", type="datetime")
     */
    private $fechaInscripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="DNI", type="integer")
     */
    private $dNI;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUIL", type="bigint")
     */
    private $cUIL;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=255)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=255)
     */
    private $localidad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo_postal", type="integer")
     */
    private $codigoPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer")
     */
    private $telefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono_laboral", type="integer")
     */
    private $telefonoLaboral;

    /**
     * @var integer
     *
     * @ORM\Column(name="celular", type="integer")
     */
    private $celular;


    
    /**
    * @ORM\OneToOne(targetEntity="EstudioPrimario", inversedBy="formulario" , cascade={"persist", "remove", "merge"},fetch="EAGER") //no puedo tener mas de un estudio primario ...
    */
    private $estudio_primario;

    //no puedo tener mas de un estudio secundario...
    /**
    * @ORM\OneToOne(targetEntity="EstudioSecundario", inversedBy="formulario" ,cascade={"persist", "remove", "merge"} ,fetch="EAGER") //no puedo tener mas de un estudio primario ...
    */
    private $estudio_secundario;

    //puedo tener mas de un estudio terciarios...

    /**
    * @ORM\OneToMany(targetEntity="EstudioSuperior", mappedBy="formulario", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $estudios_superiores;


    /**
    * @ORM\OneToMany(targetEntity="Cursos", mappedBy="formulario", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $cursos;


    /**
    * @ORM\ManyToOne(targetEntity="ConcursoxCargo", inversedBy="formularios" ,fetch="EAGER")
    */
    private $concursoxcargo;

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
     * Set estado
     *
     * @param boolean $estado
     * @return Formulario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set nroAleatorio
     *
     * @param integer $nroAleatorio
     * @return Formulario
     */
    public function setNroAleatorio($nroAleatorio)
    {
        $this->nroAleatorio = $nroAleatorio;

        return $this;
    }

    /**
     * Get nroAleatorio
     *
     * @return integer 
     */
    public function getNroAleatorio()
    {
        return $this->nroAleatorio;
    }

    /**
     * Set entregoCarpeta
     *
     * @param boolean $entregoCarpeta
     * @return Formulario
     */
    public function setEntregoCarpeta($entregoCarpeta)
    {
        $this->entregoCarpeta = $entregoCarpeta;

        return $this;
    }

    /**
     * Get entregoCarpeta
     *
     * @return boolean 
     */
    public function getEntregoCarpeta()
    {
        return $this->entregoCarpeta;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     * @return Formulario
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;

        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime 
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Formulario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Formulario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set dNI
     *
     * @param integer $dNI
     * @return Formulario
     */
    public function setDNI($dNI)
    {
        $this->dNI = $dNI;

        return $this;
    }

    /**
     * Get dNI
     *
     * @return integer 
     */
    public function getDNI()
    {
        return $this->dNI;
    }

    /**
     * Set cUIL
     *
     * @param integer $cUIL
     * @return Formulario
     */
    public function setCUIL($cUIL)
    {
        $this->cUIL = $cUIL;

        return $this;
    }

    /**
     * Get cUIL
     *
     * @return integer 
     */
    public function getCUIL()
    {
        return $this->cUIL;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Formulario
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Formulario
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return Formulario
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Formulario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set codigoPostal
     *
     * @param integer $codigoPostal
     * @return Formulario
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return integer 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Formulario
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Formulario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set telefonoLaboral
     *
     * @param integer $telefonoLaboral
     * @return Formulario
     */
    public function setTelefonoLaboral($telefonoLaboral)
    {
        $this->telefonoLaboral = $telefonoLaboral;

        return $this;
    }

    /**
     * Get telefonoLaboral
     *
     * @return integer 
     */
    public function getTelefonoLaboral()
    {
        return $this->telefonoLaboral;
    }

    /**
     * Set celular
     *
     * @param integer $celular
     * @return Formulario
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return integer 
     */
    public function getCelular()
    {
        return $this->celular;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cursos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cursos
     *
     * @param \Home\BackendBundle\Entity\Cursos $cursos
     * @return Formulario
     */
    public function addCurso(\Home\BackendBundle\Entity\Cursos $cursos)
    {
        //$cursos->setCursos($this);
        $this->cursos[] = $cursos;

        return $this;
    }

    /**
     * Remove cursos
     *
     * @param \Home\BackendBundle\Entity\Cursos $cursos
     */
    public function removeCurso(\Home\BackendBundle\Entity\Cursos $cursos)
    {
        $this->cursos->removeElement($cursos);
    }

    /**
     * Get cursos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCursos()
    {
        return $this->cursos;
    }

     /**
     * Get cursos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
   

    /**
     * Set concursoxcargo
     *
     * @param \Home\BackendBundle\Entity\ConcursoxCargo $concursoxcargo
     * @return Formulario
     */
    public function setConcursoxcargo(\Home\BackendBundle\Entity\ConcursoxCargo $concursoxcargo = null)
    {
        $this->concursoxcargo = $concursoxcargo;

        return $this;
    }

    /**
     * Get concursoxcargo
     *
     * @return \Home\BackendBundle\Entity\ConcursoxCargo 
     */
    public function getConcursoxcargo()
    {
        return $this->concursoxcargo;
    }

    /**
     * Set estudio_primario
     *
     * @param \Home\BackendBundle\Entity\EstudioPrimario $estudioPrimario
     * @return Formulario
     */
    public function setEstudioPrimario(\Home\BackendBundle\Entity\EstudioPrimario $estudioPrimario = null)
    {
        $this->estudio_primario = $estudioPrimario;

        return $this;
    }

    /**
     * Get estudio_primario
     *
     * @return \Home\BackendBundle\Entity\EstudioPrimario 
     */
    public function getEstudioPrimario()
    {
        return $this->estudio_primario;
    }

    /**
     * Set estudio_secundario
     *
     * @param \Home\BackendBundle\Entity\EstudioSecundario $estudioSecundario
     * @return Formulario
     */
    public function setEstudioSecundario(\Home\BackendBundle\Entity\EstudioSecundario $estudioSecundario = null)
    {
        $this->estudio_secundario = $estudioSecundario;

        return $this;
    }

    /**
     * Get estudio_secundario
     *
     * @return \Home\BackendBundle\Entity\EstudioSecundario 
     */
    public function getEstudioSecundario()
    {
        return $this->estudio_secundario;
    }

    /**
     * Add estudios_superiores
     *
     * @param \Home\BackendBundle\Entity\EstudioSuperior $estudiosSuperiores
     * @return Formulario
     */
    public function addEstudiosSuperiore(\Home\BackendBundle\Entity\EstudioSuperior $estudiosSuperiores)
    {
        $estudiosSuperiores->setEstudiosSuperiores($this);
        $this->estudios_superiores[] = $estudiosSuperiores;

        return $this;
    }

    /**
     * Remove estudios_superiores
     *
     * @param \Home\BackendBundle\Entity\EstudioSuperior $estudiosSuperiores
     */
    public function removeEstudiosSuperiore(\Home\BackendBundle\Entity\EstudioSuperior $estudiosSuperiores)
    {
        $this->estudios_superiores->removeElement($estudiosSuperiores);
    }

    /**
     * Get estudios_superiores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEstudiosSuperiores()
    {
        return $this->estudios_superiores;
    }

    public function __toString()
    {
        return (string)$this->dNI;
    }

    
}
