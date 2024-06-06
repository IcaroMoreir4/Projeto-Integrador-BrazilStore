<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cliente")
 */
class Cliente extends Usuario 
{
        /**
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Column(type="integer")
         */
        protected $id;
    
        /**
         * @ORM\Column(type="string")
         */
        protected $nome;
    
        /**
         * @ORM\Column(type="string")
         */
        protected $email;
    
        /**
         * @ORM\Column(type="string")
         */
        protected $cpf;
    
        /**
         * @ORM\Column(type="string")
         */
        protected $senha;
    
        /**
         * @ORM\Column(type="string")
         */
        protected $telefone;
    
        /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $alerta;
    
        // Método construtor
        public function __construct($nome, $email, $cpf, $senha, $telefone){
            $this->nome = $nome;
            $this->email = $email;
            $this->cpf = $cpf;
            $this->senha = $senha;
            $this->telefone = $telefone;
        }

    
    // Métodos getters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getAlerta(){
        return $this->alerta;
    }

    // Métodos setters
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setAlerta($alerta){
        $this->alerta = $alerta;
    }
}
?>
