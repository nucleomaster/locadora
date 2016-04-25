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
        
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getGenero() {
        return $this->genero;
    }

    function getLancamento() {
        return $this->lancamento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setLancamento($lancamento) {
        $this->lancamento = $lancamento;
    }

    
}
