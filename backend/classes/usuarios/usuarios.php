<?php

abstract class usuario{
    protected $id;
    protected $nome;
    protected $email;
    protected $cpf;
    protected $senha;
    protected $telefone;
    protected $id_endereco;

    public function __construct($id, $nome, $email, $cpf, $senha, $telefone, $id_endereco){
        $this-> id = $id;
        $this-> nome = $nome;
        $this-> email = $email;
        $this-> cpf = $cpf;
        $this-> senha = $senha;
        $this-> telefone = $telefone;
        $this-> id_endereco = $id_endereco;
    }


    //Getters
    public function getId(){
        return $this-> id;
    }

    public function getNome(){
        return $this-> nome;
    }

    public function getEmail(){
        return $this-> email;
    }

    public function getCpf(){
        return $this-> cpf;
    }

    public function getSenha(){
        return $this-> senha;
    }

    public function getTelefone(){
        return $this-> telefone;
    }

    public function getId_endereco(){
        return $this-> id_endereco;
    }


    //Setters
    public function setId($id){
        $this-> id = $id;
    }

    public function setNome($nome){
        $this-> nome = $nome;
    }

    public function setEmail($email){
        $this-> email = $email;
    }

    public function setCpf($cpf){
        $this-> cpf = $cpf;
    }

    public function setSenha($senha){
        $this-> senha = $senha;
    }

    public function setTelefone($telefone){
        $this-> telefone = $telefone;
    }

    public function setId_endereco($id_endereco){
        $this-> id_endereco = $id_endereco;
    }
}
?>