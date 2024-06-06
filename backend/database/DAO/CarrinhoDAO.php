<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');

class CarrinhoDAO {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create(Carrinho $carrinho) {
        $this->entityManager->persist($carrinho);
        $this->entityManager->flush();
    }

    public function read($id_cliente) {
        return $this->entityManager->getRepository(Carrinho::class)->findBy(['id_cliente' => $id_cliente]);
    }

    public function update(Carrinho $carrinho) {
        $existingCarrinho = $this->entityManager->find(Carrinho::class, $carrinho->getId());
        if ($existingCarrinho) {
            $existingCarrinho->setId_cliente($carrinho->getId_cliente());
            $existingCarrinho->setId_produto($carrinho->getId_produto());
            $existingCarrinho->setQuantidade($carrinho->getQuantidade());
            $existingCarrinho->setTamanho($carrinho->getTamanho());
            $existingCarrinho->setCor($carrinho->getCor());
            $this->entityManager->flush();
        }
    }

    public function updateItem($quantidade, $id) {
        $carrinho = $this->entityManager->find(Carrinho::class, $id);
        if ($carrinho) {
            $carrinho->setQuantidade($quantidade);
            $this->entityManager->flush();
        }
    }

    public function delete(Carrinho $carrinho) {
        $existingCarrinho = $this->entityManager->find(Carrinho::class, $carrinho->getId());
        if ($existingCarrinho) {
            $this->entityManager->remove($existingCarrinho);
            $this->entityManager->flush();
        }
    }

    public function createItem($id, $tamanho, $cor) {
        $itemCarrinho = new CarrinhoItem();
        $itemCarrinho->setId_produto($id);
        $itemCarrinho->setTamanho($tamanho);
        $itemCarrinho->setCor($cor);
        $this->entityManager->persist($itemCarrinho);
        $this->entityManager->flush();
    }

    public function getItensPorCliente($idCliente) {
        return $this->entityManager->getRepository(Carrinho::class)->findBy(['id_cliente' => $idCliente]);
    }
}
?>
