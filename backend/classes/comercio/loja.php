<?php 

class loja{
    protected $id;
    protected $nome;
    protected $email;
    protected $senha;
    protected $descricao;
    protected $id_vendedor;
    protected $id_avaliacao;



    public function __construct($nome,$descricao, $email, $senha, $id_vendedor)
    {
        $this->nome = $nome;
        $this->email= $email;
        $this->senha = $senha;
        $this->descricao = $descricao;
        $this->id_vendedor = $id_vendedor;
    }


    //Getters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }

    public function getEmail(){
        return $this-> email;
    }

    public function getSenha(){
        return $this-> senha;
    }

    public function getIdvendedor(){
        return $this->id_vendedor;
    }

    public function getIdavaliacao(){
        return $this->id_avaliacao;
    }


    //Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setEmail($email){
        $this-> email = $email;
    }

    public function setSenha($senha){
        $this-> senha = $senha;
    }

    public function setIdvendedor($id_vendedor){
        $this->id_vendedor = $id_vendedor;
    }

    public function setIdavaliacao($id_avaliacao){
        $this->id_avaliacao = $id_avaliacao;
    }
}
?>