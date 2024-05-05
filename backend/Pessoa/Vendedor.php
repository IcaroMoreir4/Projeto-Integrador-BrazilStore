<?php 
class Vendedor extends Pessoa{
    protected $cnpj;
    protected $endereco;

    public function __construct($id,$nome,$email,$senha,$telefone, $cnpj, $endereco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha= $senha;
        $this->telefone = $telefone;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
    }

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
    
    public function getCnpj(){
        return $this->cnpj;
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
    
    public function setCpf($cnpj){
        $this->cnpj = $cnpj;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}

?>