<?php

class endereco{
    protected $id;
    protected $logradouro;
    protected $numero;
    protected $bairro;
    protected $cep;
    protected $id_cidade;
    protected $nome_cidade;
    protected $cep_cidade;
    protected $id_estado;
    protected $nome_estado;
    protected $sigla;

    public function __construct($id, $logradouro, $numero, $bairro, $cep, $id_cidade, $nome_cidade, $cep_cidade, $id_estado, $nome_estado, $sigla){
        $this-> id = $id;
        $this-> logradouro = $logradouro;
        $this-> numero = $numero;
        $this-> bairro = $bairro;
        $this-> cep = $cep;
        $this-> id_cidade = $id_cidade;
        $this-> nome_cidade = $nome_cidade;
        $this-> cep_cidade = $cep_cidade;
        $this-> id_estado = $id_estado;
        $this-> nome_estado = $nome_estado;
        $this-> sigla = $sigla;
    }


    //Getters
    public function getId(){
        return $this->id;
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

    public function getId_cidade(){
        return $this->id_cidade;
    }

    public function getNome_cidade(){
        return $this->nome_cidade;
    }

    public function getCep_cidade (){
        return $this->cep_cidade;
    }

    public function getId_estado(){
        return $this->id_estado;
    }

    public function getNome_estado(){
        return $this->nome_estado;
    }

    public function getSigla(){
        return $this->sigla;
    }


    //Setters
    public function setId($id){
        $this-> id = $id;
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

    public function setId_cidade($id_cidade){
        $this-> id_cidade = $id_cidade;
    }

    public function setNome_cidade($nome_cidade){
        $this-> nome_cidade = $nome_cidade;
    }

    public function setCep_cidade($cep_cidade){
        $this-> cep_cidade = $cep_cidade;
    }

    public function setId_estado($id_estado){
        $this-> id_estado = $id_estado;
    }

    public function setNome_estado($nome_estado){
        $this-> nome_estado = $nome_estado;
    }

    public function setSigla($sigla){
        $this-> sigla = $sigla;
    }
}