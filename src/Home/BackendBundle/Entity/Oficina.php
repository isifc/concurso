<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Oficina
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\OficinaRepository")
 */
class Oficina
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
    * @ORM\ManyToOne(targetEntity="Jurisdiccion", cascade={"all"}, fetch="EAGER")
    */
    private $jurisdiccion; 

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion_corta", type="string", length=255)
     */
    private $denominacionCorta;

    /**
     * @var integer
     *
     * @ORM\Column(name="OfiCUE", type="integer")
     */
    private $ofiCUE;

    /**
     * @var integer
     *
     * @ORM\Column(name="OfiCUI", type="integer")
     */
    private $ofiCUI;

    /**
     * @var integer
     *
     * @ORM\Column(name="JurMarcBaj", type="integer")
     */
    private $jurMarcBaj;

    /**
    * @ORM\OneToMany(targetEntity="ConcursoxCargo", mappedBy="concurso", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $concursoxcargos;

    /**
    * @ORM\ManyToOne(targetEntity="Ambito", inversedBy="oficinas" ,fetch="EAGER")
    */
    private $ambito;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Oficina
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
     * Set denominacionCorta
     *
     * @param string $denominacionCorta
     * @return Oficina
     */
    public function setDenominacionCorta($denominacionCorta)
    {
        $this->denominacionCorta = $denominacionCorta;

        return $this;
    }

    /**
     * Get denominacionCorta
     *
     * @return string 
     */
    public function getDenominacionCorta()
    {
        return $this->denominacionCorta;
    }

    /**
     * Set ofiCUE
     *
     * @param integer $ofiCUE
     * @return Oficina
     */
    public function setOfiCUE($ofiCUE)
    {
        $this->ofiCUE = $ofiCUE;

        return $this;
    }

    /**
     * Get ofiCUE
     *
     * @return integer 
     */
    public function getOfiCUE()
    {
        return $this->ofiCUE;
    }

    /**
     * Set ofiCUI
     *
     * @param integer $ofiCUI
     * @return Oficina
     */
    public function setOfiCUI($ofiCUI)
    {
        $this->ofiCUI = $ofiCUI;

        return $this;
    }

    /**
     * Get ofiCUI
     *
     * @return integer 
     */
    public function getOfiCUI()
    {
        return $this->ofiCUI;
    }

    /**
     * Set jurMarcBaj
     *
     * @param integer $jurMarcBaj
     * @return Oficina
     */
    public function setJurMarcBaj($jurMarcBaj)
    {
        $this->jurMarcBaj = $jurMarcBaj;

        return $this;
    }

    /**
     * Get jurMarcBaj
     *
     * @return integer 
     */
    public function getJurMarcBaj()
    {
        return $this->jurMarcBaj;
    }
    /**
     * Constructor
     */
   

 

    /**
     * Set jurisdiccion
     *
     * @param \Home\BackendBundle\Entity\Jurisdiccion $jurisdiccion
     * @return Oficina
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


    public function __toString(){
        return $this->denominacionCorta;
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
     * @return Oficina
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

    /**
     * Set ambito
     *
     * @param \Home\BackendBundle\Entity\Ambito $ambito
     * @return Oficina
     */
    public function setAmbito(\Home\BackendBundle\Entity\Ambito $ambito = null)
    {
        $this->ambito = $ambito;

        return $this;
    }

    /**
     * Get ambito
     *
     * @return \Home\BackendBundle\Entity\Ambito 
     */
    public function getAmbito()
    {
        return $this->ambito;
    }
}
