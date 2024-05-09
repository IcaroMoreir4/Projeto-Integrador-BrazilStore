<?php 
class loja{
    protected $id;
    protected $nome;
    protected $descricao;
    protected $id_vendedor;
    protected $id_avaliacao;


    public function __construct($id,$nome,$descricao,$id_vendedor,$id_avaliacao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->id_vendedor = $id_vendedor;
        $this->id_avaliacao = $id_avaliacao;
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

    public function setIdvendedor($id_vendedor){
        $this->id_vendedor = $id_vendedor;
    }

    public function setIdavaliacao($id_avaliacao){
        $this->id_avaliacao = $id_avaliacao;
    }
}
?>