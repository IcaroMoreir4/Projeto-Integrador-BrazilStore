<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');
require_once(__DIR__ . '/../../classes/comercio/Pedido.php');

class PedidoDAO {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    // Função para criar um novo pedido
    public function create(Pedido $pedido) {
        $this->entityManager->persist($pedido);
        $this->entityManager->flush();
    }

    // Função para ler todos os pedidos
    public function read() {
        return $this->entityManager->getRepository(Pedido::class)->findAll();
    }

    // Função para atualizar um pedido
    public function update(Pedido $pedido) {
        $this->entityManager->merge($pedido);
        $this->entityManager->flush();
    }

    // Função para deletar um pedido
    public function delete(Pedido $pedido) {
        $pedidoToDelete = $this->entityManager->find(Pedido::class, $pedido->getId());
        if ($pedidoToDelete) {
            $this->entityManager->remove($pedidoToDelete);
            $this->entityManager->flush();
        }
    }

    // Função para listar pedidos por cliente
    public function listarPedidosPorCliente($id_cliente) {
        return $this->entityManager->getRepository(Pedido::class)->findBy(['id_cliente' => $id_cliente]);
    }

    // Função para criar um valor de pedido
    public function valor_pedido($total) {
        $valorPedido = new ValorPedido();
        $valorPedido->setTotal($total);
        $this->entityManager->persist($valorPedido);
        $this->entityManager->flush();
    }

    // Função para atualizar a forma de pagamento de um pedido
    public function atualizarFormaPagamento(Pedido $pedido, $forma_pagamento) {
        $pedido->setFormaPagamento($forma_pagamento);
        $this->entityManager->merge($pedido);
        $this->entityManager->flush();
    }

    // Função para criar um pedido com valor e forma de pagamento
    public function create_pedido($valor, $forma_pagamento) {
        $pedido = new Pedido();
        $pedido->setValor($valor);
        $pedido->setFormaPagamento($forma_pagamento);
        $this->entityManager->persist($pedido);
        $this->entityManager->flush();
    }
}
?>
