<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Ambito
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\AmbitoRepository")
 */
class Ambito
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
     * @ORM\Column(name="denominacion", type="string", length=255)
     */
    private $denominacion;

     /**
    * @ORM\OneToMany(targetEntity="Oficina", mappedBy="ambito", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $oficinas;
   


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
     * Set denominacion
     *
     * @param string $denominacion
     * @return Ambito
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
     * Constructor
     */
    public function __construct()
    {
        $this->oficinas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add oficinas
     *
     * @param \Home\BackendBundle\Entity\oficinas $oficinas
     * @return Ambito
     */
    public function addOficina(\Home\BackendBundle\Entity\oficinas $oficinas)
    {
        $this->oficinas[] = $oficinas;

        return $this;
    }

    /**
     * Remove oficinas
     *
     * @param \Home\BackendBundle\Entity\oficinas $oficinas
     */
    public function removeOficina(\Home\BackendBundle\Entity\oficinas $oficinas)
    {
        $this->oficinas->removeElement($oficinas);
    }

    /**
     * Get oficinas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOficinas()
    {
        return $this->oficinas;
    }
}
