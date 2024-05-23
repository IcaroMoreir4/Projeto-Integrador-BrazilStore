<?php 

class produto{
    protected $id;
    protected $nome;
    protected $id_categoria;
    protected $valor;
    protected $descricao;
    protected $peso;
    protected $tipo_entrega;
    protected $imagem;


    public function __construct($nome,$valor,$descricao, $id_categoria, $peso, $tipo_entrega, $imagem)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->id_categoria = $id_categoria;
        $this->peso = $peso;
        $this->tipo_entrega = $tipo_entrega;
        $this->imagem= $imagem;
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

    public function getPeso(){
        return $this->peso;
    }

    public function getTipoEentrega(){
        return $this->tipo_entrega;
    }

    public function getImagem(){
        return $this->imagem;
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

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function setTipoEntrega($tipo_entrega){
        $this->tipo_entrega = $tipo_entrega;
    }
    public function setImagem($imagem){
       $this->imagem = $imagem;
    }

}
?>