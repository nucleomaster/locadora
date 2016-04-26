<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $nome;
    
    /**
     *
     * @ORM\Column(type="string", length=80)
     */
    private $genero;
    
    /**
     *
     * @ORM\Column(type="boolean")
     */
    private $lancamento;
        
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
    
}
