<?php 

class Cliente extends Pessoa{
    protected $cpf;
    protected $endereco;


    public function __construct($id,$nome,$email,$senha,$telefone, $cpf, $endereco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha= $senha;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->endereco =$endereco;

    }
    
    //getters
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    //Setters
    public function setId($id){
        $this->id =$id;
    }
    
    public function setNome($nome){
         $this->nome = $nome;
    }
    
    public function setEmail($email){
         $this->email = $email;
    }
    
    public function setSenha($senha){
         $this->senha = $senha;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}



?>