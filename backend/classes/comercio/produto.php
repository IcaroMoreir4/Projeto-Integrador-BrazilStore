<?php 

class produto{
    protected $id;
    protected $nome;
    protected $id_categoria;
    protected $valor;
    protected $descricao;
    protected $id_loja;
    protected $id_avaliacao;

    public function __construct($id,$nome,$id_categoria,$valor,$descricao,$id_loja,$id_avaliacao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->id_categoria = $id_categoria;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->id_loja = $id_loja;
        $this->id_avaliacao = $id_avaliacao;
    }

    
    //Gettters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getIdcategoria(){
        return $this->id_categoria;
    }

    public function getValor(){
        return $this->valor;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getIdloja(){
        return $this->id_loja;
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

    public function setIdcategoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setIdloja($id_loja){
        $this->id_loja = $id_loja;
    }
    
    public function setIdavaliacao($id_avaliacao){
        $this->id_avaliacao = $id_avaliacao;
    }
}
?>