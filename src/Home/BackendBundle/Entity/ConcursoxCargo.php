<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConcursoxCargo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\ConcursoxCargoRepository")
 */
class ConcursoxCargo
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
    * @ORM\ManyToOne(targetEntity="Concurso", inversedBy="concursoxcargos" ,fetch="EAGER")
    * @ORM\JoinColumn(onDelete="CASCADE")
    */
    private $concurso;

    /**
    * @ORM\ManyToOne(targetEntity="Cargo", inversedBy="concursoxcargos" ,fetch="EAGER")
    */
    private $cargo;

    /**
    * @ORM\ManyToOne(targetEntity="Oficina", inversedBy="concursoxcargos" ,fetch="EAGER")
    */
    private $oficina;

    /**
    * @ORM\OneToMany(targetEntity="Formulario", mappedBy="concursoxcargo", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $formularios;



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
     * Constructor
     */
    public function __construct()
    {
        $this->formularios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set concurso
     *
     * @param \Home\BackendBundle\Entity\Concurso $concurso
     * @return ConcursoxCargo
     */
    public function setConcurso(\Home\BackendBundle\Entity\Concurso $concurso = null)
    {
        $this->concurso = $concurso;

        return $this;
    }

    /**
     * Get concurso
     *
     * @return \Home\BackendBundle\Entity\Concurso 
     */
    public function getConcurso()
    {
        return $this->concurso;
    }

    /**
     * Set cargo
     *
     * @param \Home\BackendBundle\Entity\Cargo $cargo
     * @return ConcursoxCargo
     */
    public function setCargo(\Home\BackendBundle\Entity\Cargo $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \Home\BackendBundle\Entity\Cargo 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set oficina
     *
     * @param \Home\BackendBundle\Entity\Oficina $oficina
     * @return ConcursoxCargo
     */
    public function setOficina(\Home\BackendBundle\Entity\Oficina $oficina = null)
    {
        $this->oficina = $oficina;

        return $this;
    }

    /**
     * Get oficina
     *
     * @return \Home\BackendBundle\Entity\Oficina 
     */
    public function getOficina()
    {
        return $this->oficina;
    }

    /**
     * Add formularios
     *
     * @param \Home\BackendBundle\Entity\Formulario $formularios
     * @return ConcursoxCargo
     */
    public function addFormulario(\Home\BackendBundle\Entity\Formulario $formularios)
    {
        $this->formularios[] = $formularios;

        return $this;
    }

    /**
     * Remove formularios
     *
     * @param \Home\BackendBundle\Entity\Formulario $formularios
     */
    public function removeFormulario(\Home\BackendBundle\Entity\Formulario $formularios)
    {
        $this->formularios->removeElement($formularios);
    }

    /**
     * Get formularios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormularios()
    {
        return $this->formularios;
    }


    public function __toString(){
        return (string)$this->getCargo()." ";
    }
}
