<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="produto")
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nome;

    /**
     * @ORM\Column(type="integer")
     */
    protected $id_categoria;

    /**
     * @ORM\Column(type="float")
     */
    protected $valor;

    /**
     * @ORM\Column(type="text")
     */
    protected $descricao;

    /**
     * @ORM\Column(type="float")
     */
    protected $peso;

    /**
     * @ORM\Column(type="string")
     */
    protected $tipo_entrega;

    /**
     * @ORM\Column(type="integer")
     */
    protected $id_vendedor;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $image_path;

    // Métodos getters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getIdCategoria(){
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

    public function getTipoEntrega(){
        return $this->tipo_entrega;
    }

    public function getIdVendedor(){
        return $this->id_vendedor;
    }

    public function getImagePath(){
        return $this->image_path;
    }

    // Métodos setters
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setIdCategoria($id_categoria){
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

    public function setIdVendedor($id_vendedor){
        $this->id_vendedor = $id_vendedor;
    }

    public function setImagePath($image_path){
        $this->image_path= $image_path;
    }
}
