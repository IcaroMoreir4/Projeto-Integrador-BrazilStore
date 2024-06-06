<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pedido")
 */
class Pedido {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Carrinho")
     * @ORM\JoinColumn(name="id_carrinho", referencedColumnName="id")
     */
    protected $idCarrinho;

    /** @ORM\Column(type="datetime") */
    protected $data;

    /** @ORM\Column(type="string") */
    protected $status;

    public function __construct($idCarrinho, $data, $status) {
        $this->idCarrinho = $idCarrinho;
        $this->data = $data;
        $this->status = $status;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdCarrinho() {
        return $this->idCarrinho;
    }

    public function getData() {
        return $this->data;
    }

    public function getStatus() {
        return $this->status;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCarrinho($idCarrinho) {
        $this->idCarrinho = $idCarrinho;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}

?>
