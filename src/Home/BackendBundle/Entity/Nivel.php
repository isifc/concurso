<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Nivel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\NivelRepository")
 */
class Nivel
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
     * @ORM\OneToMany(targetEntity="EstudioSuperior", mappedBy="nivel")
    */
    private $estudios_superiores;
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
     * @return Nivel
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
        $this->estudios_superiores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estudios_superiores
     *
     * @param \Home\BackendBundle\Entity\EstudioSuperior $estudiosSuperiores
     * @return Nivel
     */
    public function addEstudiosSuperiore(\Home\BackendBundle\Entity\EstudioSuperior $estudiosSuperiores)
    {
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
}
