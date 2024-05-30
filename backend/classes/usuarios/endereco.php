<?php

class endereco{
    protected $id;
    protected $id_cliente;
    protected $nome_comp;
    protected $telefone_end;
    protected $logradouro;
    protected $numero;
    protected $bairro;
    protected $cep;
    protected $nome_cidade;
    protected $nome_estado;
    
    public function __construct($id, $id_cliente, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado){
        $this-> id = $id;
        $this-> id_cliente = $id_cliente;
        $this-> nome_comp = $nome_comp;
        $this-> telefone_end = $telefone_end;
        $this-> logradouro = $logradouro;
        $this-> numero = $numero;
        $this-> bairro = $bairro;
        $this-> cep = $cep;
        $this-> nome_cidade = $nome_cidade;
        $this-> nome_estado = $nome_estado;
    }


    //Getters
    public function getId(){
        return $this->id;
    }

    public function getId_cliente(){
        return $this->id_cliente;
    }

    public function getNome_comp(){
        return $this->nome_comp;
    }

    public function getTelefone_end(){
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

    public function getNome_cidade(){
        return $this->nome_cidade;
    }

    public function getNome_estado(){
        return $this->nome_estado;
    }


    //Setters
    public function setId($id){
        $this-> id = $id;
    }

    public function setId_cliente($id_cliente){
        $this-> id_cliente = $id_cliente;
    }

    public function setNome_comp($nome_comp){
        $this-> nome_comp = $nome_comp;
    }

    public function setTelefone_end($telefone_end){
        $this-> telefone_end = $telefone_end;
    }

    public function setLogradouro($logradouro){
        $this-> logradouro = $logradouro;
    }

    public function setNumero($numero){
        $this-> numero = $numero;
    }

    public function setBairro($bairro){
        $this-> bairro = $bairro;
    }

    public function setCep($cep){
        $this-> cep = $cep;
    }

    public function setNome_cidade($nome_cidade){
        $this-> nome_cidade = $nome_cidade;
    }

    public function setNome_estado($nome_estado){
        $this-> nome_estado = $nome_estado;
    }
}