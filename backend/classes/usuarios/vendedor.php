<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vendedores")
 */
class Vendedor {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=14, unique=true)
     */
    protected $cpf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $senha;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $telefone;

    /**
     * @ORM\Column(type="integer")
     */
    protected $id_endereco;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $alerta;

    // Getters e Setters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getId_endereco(){
        return $this->id_endereco;
    }

    public function setId_endereco($id_endereco){
        $this->id_endereco = $id_endereco;
    }

    public function getAlerta(){
        return $this->alerta;
    }

    public function setAlerta($alerta){
        $this->alerta = $alerta;
    }
}
?>
