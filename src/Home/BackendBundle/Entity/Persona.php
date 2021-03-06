<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\PersonaRepository")
 */
class Persona
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
     * @var integer
     *
     * @ORM\Column(name="DNI", type="bigint")
     */
    private $dNI;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidoynombre", type="string", length=255)
     */
    private $apellidoynombre;

    /**
     * @var string
     *
     * @ORM\Column(name="escalafon", type="string", length=255)
     */
    private $escalafon;

    /**
     * @var string
     *
     * @ORM\Column(name="planta_permanente", type="string", length=255)
     */
    private $plantaPermanente;

    /**
    * @ORM\ManyToOne(targetEntity="Jurisdiccion", cascade={"all"}, fetch="EAGER")
    */
    private $jurisdiccion; 
    
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
     * Set dNI
     *
     * @param integer $dNI
     * @return Persona
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
     * Set apellidoynombre
     *
     * @param string $apellidoynombre
     * @return Persona
     */
    public function setApellidoynombre($apellidoynombre)
    {
        $this->apellidoynombre = $apellidoynombre;

        return $this;
    }

    /**
     * Get apellidoynombre
     *
     * @return string 
     */
    public function getApellidoynombre()
    {
        return $this->apellidoynombre;
    }

    /**
     * Set escalafon
     *
     * @param string $escalafon
     * @return Persona
     */
    public function setEscalafon($escalafon)
    {
        $this->escalafon = $escalafon;

        return $this;
    }

    /**
     * Get escalafon
     *
     * @return string 
     */
    public function getEscalafon()
    {
        return $this->escalafon;
    }

    /**
     * Set plantaPermanente
     *
     * @param string $plantaPermanente
     * @return Persona
     */
    public function setPlantaPermanente($plantaPermanente)
    {
        $this->plantaPermanente = $plantaPermanente;

        return $this;
    }

    /**
     * Get plantaPermanente
     *
     * @return string 
     */
    public function getPlantaPermanente()
    {
        return $this->plantaPermanente;
    }

    /**
     * Set jurisdiccion
     *
     * @param \Home\BackendBundle\Entity\Jurisdiccion $jurisdiccion
     * @return Persona
     */
    public function setJurisdiccion(\Home\BackendBundle\Entity\Jurisdiccion $jurisdiccion = null)
    {
        $this->jurisdiccion = $jurisdiccion;

        return $this;
    }

    /**
     * Get jurisdiccion
     *
     * @return \Home\BackendBundle\Entity\Jurisdiccion 
     */
    public function getJurisdiccion()
    {
        return $this->jurisdiccion;
    }
}
