<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="avaliacao_produto")
 */
class AvaliacaoProduto {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="datetime") */
    protected $data;

    /** @ORM\Column(type="integer") */
    protected $quantEstrela;

    /** @ORM\Column(type="text") */
    protected $comentario;

    /** @ORM\Column(type="integer") */
    protected $idProduto;

    /** @ORM\Column(type="integer") */
    protected $idPedido;

    public function __construct($data, $quantEstrela, $comentario, $idProduto, $idPedido) {
        $this->data = $data;
        $this->quantEstrela = $quantEstrela;
        $this->comentario = $comentario;
        $this->idProduto = $idProduto;
        $this->idPedido = $idPedido;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getQuantEstrela() {
        return $this->quantEstrela;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setQuantEstrela($quantEstrela) {
        $this->quantEstrela = $quantEstrela;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }
}
?>
