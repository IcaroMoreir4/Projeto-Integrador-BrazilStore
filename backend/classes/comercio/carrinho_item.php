<?php

class carrinho{
    protected $id;
    protected $id_item;
    protected $id_cliente;

    public function __construct ($id, $id_item, $id_cliente){
        $this->id = $id;
        $this->id_item = $id_item;
        $this->id_cliente = $id_cliente;
    }


    //Getters
    public function getId(){
        return $this->id;
    }

    public function getId_item(){
        return $this->id_item;
    }

    public function getId_cliente(){
        return $this->id_cliente;
    }


    //Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setId_item($id_item){
        $this->id_item = $id_item;
    }

    public function setId_cliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }
}

// ---------------------------------------------------------
class item_carrinho{
    protected $id;
    protected $id_produto;
    protected $quantidade;

    public function __construct ($id, $id_produto, $quantidade){
        $this->id = $id;
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
    }


    //Getters
    public function getId(){
        return $this->id;
    }

    public function getId_produto(){
        return $this->id_produto;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }


    //Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setId_produto($id_produto){
        $this->id_produto = $id_produto;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
}
?>
}
?>