<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="endereco")
 */
class Endereco
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $id_cliente;

    /**
     * @ORM\Column(type="string")
     */
    protected $nome_comp;

    /**
     * @ORM\Column(type="string")
     */
    protected $telefone_end;

    /**
     * @ORM\Column(type="string")
     */
    protected $logradouro;

    /**
     * @ORM\Column(type="string")
     */
    protected $numero;

    /**
     * @ORM\Column(type="string")
     */
    protected $bairro;

    /**
     * @ORM\Column(type="string")
     */
    protected $cep;

    /**
     * @ORM\Column(type="string")
     */
    protected $nome_cidade;

    /**
     * @ORM\Column(type="string")
     */
    protected $nome_estado;

    // Método construtor
    public function __construct($id, $id_cliente, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado){
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->nome_comp = $nome_comp;
        $this->telefone_end = $telefone_end;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->nome_cidade = $nome_cidade;
        $this->nome_estado = $nome_estado;
    }

    // Métodos getters
    public function getId(){
        return $this->id;
    }

    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function getNomeComp(){
        return $this->nome_comp;
    }

    public function getTelefoneEnd(){
        return $this->telefone_end;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCep(){
        return $this->cep;
    }

    public function getNomeCidade(){
        return $this->nome_cidade;
    }

    public function getNomeEstado(){
        return $this->nome_estado;
    }

    // Métodos setters
    public function setId($id){
        $this->id = $id;
    }

    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function setNomeComp($nome_comp){
        $this->nome_comp = $nome_comp;
    }

    public function setTelefoneEnd($telefone_end){
        $this->telefone_end = $telefone_end;
    }

    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function setNomeCidade($nome_cidade){
        $this->nome_cidade = $nome_cidade;
    }

    public function setNomeEstado($nome_estado){
        $this->nome_estado = $nome_estado;
    }
}
?>
