<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//mapeamento dos campos do doctrine
use Symfony\Component\Validator\Constraints as Assert;
//validação - verificações de campos

/**
 * @ORM\Entity
 * @ORM\Table(name="filmes")
 */
class Filmes 
{   /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
     *
     * @ORM\Column(type="string", length=200)
     * @Assert\NotBlank()
     */
    private $nome;
    
    /**
     *
     * @ORM\Column(type="string", length=80)
     * @Assert\NotEqualTo(value="Selecione", message="Selecione um gênero válido")
     */
    private $genero;
    
    /**
     *
     * @ORM\Column(type="boolean")
     */
    private $lancamento;
    
    /**
     *
     * @ORM\Column(type="text")
     */
    private $sinopse;
    
    /**
     *
     * @ORM\Column(type="date")
     */
    private $data;
    
    /**
     *
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $capa;
        
    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * 
     * @return string
     */
    public function getGenero() {
        return $this->genero;
    }

    /**
     * 
     * @return boolean
     */
    public function getLancamento() {
        return $this->lancamento;
    }
    
    /**
     * 
     * @param string $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * 
     * @param string $genero
     */
    public function setGenero($genero) {
        $this->genero = $genero;
    }
    
    /**
     * 
     * @param boolean $lancamento
     */
    public function setLancamento($lancamento) {
        if (is_bool($lancamento)){            
        $this->lancamento = $lancamento;
        }else{
            throw new \BadMethodCallException("O valor deve ser do tipo boleano");
            
        }
    }
    

    /**
     * Set sinopse
     *
     * @param string $sinopse
     *
     * @return Filmes
     */
    public function setSinopse($sinopse)
    {
        $this->sinopse = $sinopse;

        return $this;
    }

    /**
     * Get sinopse
     *
     * @return string
     */
    public function getSinopse()
    {
        return $this->sinopse;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Filmes
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set capa
     *
     * @param string $capa
     *
     * @return Filmes
     */
    public function setCapa($capa)
    {
        $this->capa = $capa;

        return $this;
    }

    /**
     * Get capa
     *
     * @return string
     */
    public function getCapa()
    {
        return $this->capa;
    }
}
