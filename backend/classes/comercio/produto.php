<?php 

class produto{
    protected $id;
    protected $nome;
    protected $categoria;
    protected $valor;
    protected $descricao;


    public function __construct($nome,$valor,$descricao, $categoria)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
    }

    
    //Gettters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCategoria(){
        return $this->categoria;
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

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

}
?>