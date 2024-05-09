<?php

//Não sei como vamos linkcar isso pois ele vai ter que puxar o id do cliente e do item junto com a quantidade de itens.

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
?>