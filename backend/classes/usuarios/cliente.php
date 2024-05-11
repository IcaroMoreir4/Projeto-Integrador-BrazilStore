<?php
require_once('usuarios.php');
class cliente extends usuario{
    
    public function __construct($nome, $email, $cpf, $senha, $telefone){
        $this-> nome = $nome;
        $this-> email = $email;
        $this-> cpf = $cpf;
        $this-> senha = $senha;
        $this-> telefone = $telefone;
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