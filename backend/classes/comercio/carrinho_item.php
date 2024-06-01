<?php
class carrinho{
    protected $id;
    protected $id_cliente;
    protected $id_produto;
    protected $quantidade;
    protected $tamanho;
    protected $cor;

    public function __construct ($id, $id_cliente, $id_produto, $quantidade, $tamanho, $cor){
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
        $this->tamanho = $tamanho;
        $this->cor = $cor;
    }

    //Getters
    public function getId(){
        return $this->id;
    }

    public function getId_cliente(){
        return $this->id_cliente;
    }

    public function getId_produto(){
        return $this->id_produto;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getTamanho(){
        return $this->tamanho;
    }

    public function getCor(){
        return $this->cor;
    }

    //Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setId_cliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function setId_produto($id_produto){
        $this->id_produto = $id_produto;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }
}
?>