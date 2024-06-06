<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="loja")
 */
class Loja {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $nome;

    /** @ORM\Column(type="string") */
    protected $email;

    /** @ORM\Column(type="string") */
    protected $senha;

    /** @ORM\Column(type="string") */
    protected $descricao;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Vendedor")
     * @ORM\JoinColumn(name="id_vendedor", referencedColumnName="id")
     */
    protected $idVendedor;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="AvaliacaoLoja")
     * @ORM\JoinColumn(name="id_avaliacao", referencedColumnName="id")
     */
    protected $idAvaliacao;

    public function __construct($nome, $descricao, $email, $senha, $idVendedor) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->email = $email;
        $this->senha = $senha;
        $this->idVendedor = $idVendedor;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getIdVendedor() {
        return $this->idVendedor;
    }

    public function getIdAvaliacao() {
        return $this->idAvaliacao;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setIdVendedor($idVendedor) {
        $this->idVendedor = $idVendedor;
    }

    public function setIdAvaliacao($idAvaliacao) {
        $this->idAvaliacao = $idAvaliacao;
    }
}

?>
