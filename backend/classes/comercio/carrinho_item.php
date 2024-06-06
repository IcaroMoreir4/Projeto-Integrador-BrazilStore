<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="carrinho")
 */
class Carrinho {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="integer") */
    protected $idCliente;

    /** @ORM\Column(type="integer") */
    protected $idProduto;

    /** @ORM\Column(type="integer") */
    protected $quantidade;

    /** @ORM\Column(type="string", nullable=true) */
    protected $tamanho;

    /** @ORM\Column(type="string", nullable=true) */
    protected $cor;

    public function __construct($idCliente, $idProduto, $quantidade, $tamanho = null, $cor = null) {
        $this->idCliente = $idCliente;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->tamanho = $tamanho;
        $this->cor = $cor;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function getCor() {
        return $this->cor;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }
}

?>
