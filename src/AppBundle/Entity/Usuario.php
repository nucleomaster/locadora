<?php
namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;




/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 */
class Usuario extends BaseUser
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
    /**
    * @ORM\Column(type="integer", nullable=true)
    * 
    */
    protected $cpf;
    
    /**
    * @ORM\Column(type="string", length=200, nullable=true)
    * 
    */
    protected $endereco;
    public function getCpf() {
        return $this->cpf;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }


}
