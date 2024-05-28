<?php 
class produto{
    protected $id;
    protected $nome;
    protected $id_categoria;
    protected $valor;
    protected $descricao;
    protected $peso;
    protected $tamanho;
    protected $cor;
    protected $tipo_entrega;
    protected $id_vendedor;


    public function __construct($nome,$valor,$descricao, $id_categoria, $peso, $tamanho, $cor, $tipo_entrega, $id_vendedor)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->id_categoria = $id_categoria;
        $this->peso = $peso;
        $this->tamanho = $tamanho;
        $this->cor = $cor;
        $this->tipo_entrega = $tipo_entrega;
        $this->id_vendedor = $id_vendedor;
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

    public function getTamanho(){
        return $this->tamanho;
    }

    public function getCor(){
        return $this->cor;
    }

    public function getTipoEentrega(){
        return $this->tipo_entrega;
    }

    public function getIdvendedor(){
        return $this->id_vendedor;
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

    public function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function setTipoEntrega($tipo_entrega){
        $this->tipo_entrega = $tipo_entrega;
    }

    public function setIdvendedor($id_vendedor){
        $this->id_vendedor = $id_vendedor;
    }
}
?>