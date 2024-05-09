<?php

class pedido{
    protected $id;
    protected $id_carrinho;
    protected $data;
    protected $status;

    public function __construct($id, $id_carrinho, $data, $status){
        $this->id = $id;
        $this-> id_carrinho = $id_carrinho;
        $this-> data = $data;
        $this-> status = $status;
    }

    //Getters
    public function getId(){
        return $this-> id;
    }

    public function getId_carrinho(){
        return $this-> id_carrinho;
    }

    public function getData(){
        return $this-> data;
    }

    public function getStatus(){
        return $this-> status;
    }


    //Setters
    public function setId($id){
        $this-> id = $id;
    }

    public function setId_carrinho($id_carrinho){
        $this-> id_carrinho = $id_carrinho;
    }

    public function setData($data){
        $this-> data = $data;
    }

    public function setStaus($status){
        $this-> status = $status;
    }
}
?>
