<?php 

class produto{
    protected $id;
    protected $nome;
    protected $id_categoria;
    protected $valor;
    protected $descricao;


    public function __construct($nome,$valor,$descricao, $id_categoria)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->id_categoria = $id_categoria;
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

}
?>