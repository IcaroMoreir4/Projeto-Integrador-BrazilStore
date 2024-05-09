<?php

class avaliacao_produto{
    protected $id;
    protected $data;
    protected $quant_estrela;
    protected $comentario;
    protected $id_produto;
    protected $id_pedido;

    public function __construct($id, $data, $quant_estrela, $comentario, $id_produto, $id_pedido){
        $this-> id = $id;
        $this-> data = $data;
        $this-> quant_estrela = $quant_estrela;
        $this-> comentario = $comentario;
        $this-> id_produto = $id_produto;
        $this-> id_pedido = $id_pedido;
    }


    //Getters
    public function getId(){
        return $this-> id;
    }

    public function getQuant_estrela(){
        return $this-> quant_estrela;
    }

    public function getData(){
        return $this-> data;
    }

    public function getComentario(){
        return $this-> comentario;
    }

    public function getId_produto(){
        return $this-> id_produto;
    }

    public function getId_pedido(){
        return $this-> id_pedido;
    }


    //Setters
    public function setId($id){
        $this-> id = $id;
    }

    public function setQaunt_estrela($quant_estrela){
        $this-> quant_estrela = $quant_estrela;
    }
    
    public function setData($date){
        $this-> data = $data;
    }

    public function setComentario($comentario){
        $this-> comentario = $comentario;
    }

    public function setId_produto($id_produto){
        $this-> id_produto = $id_produto;
    }

    public function setId_pedido($id_pedido){
        $this-> id_pedido = $id_pedido;
    }
}
?>