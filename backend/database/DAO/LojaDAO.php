<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');
require_once(__DIR__ . '/../../classes/comercio/Loja.php');

class LojaDao {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    // Função para cadastrar uma nova loja
    public function create(Loja $loja) {
        $this->entityManager->persist($loja);
        $this->entityManager->flush();
    }

    // Função para consultar todas as lojas
    public function read() {
        return $this->entityManager->getRepository(Loja::class)->findAll();
    }

    // Função para atualizar uma loja
    public function update(Loja $loja) {
        $this->entityManager->merge($loja);
        $this->entityManager->flush();
    }

    // Função para excluir uma loja
    public function delete(Loja $loja) {
        $lojaToDelete = $this->entityManager->find(Loja::class, $loja->getId());
        if ($lojaToDelete) {
            $this->entityManager->remove($lojaToDelete);
            $this->entityManager->flush();
        }
    }

    // Função para autenticar uma loja
    public function autenticar($email, $senha) {
        $repository = $this->entityManager->getRepository(Loja::class);
        $loja = $repository->findOneBy(['email' => $email, 'senha' => $senha]);
        return $loja ?: false;
    }

    // Função para obter uma loja por ID
    public function getLojaById($id) {
        return $this->entityManager->find(Loja::class, $id);
    }

    // Função para obter o ID da loja pelo ID do vendedor
    public function getIdLojaByVendedorId($id_vendedor) {
        $repository = $this->entityManager->getRepository(Loja::class);
        $loja = $repository->findOneBy(['id_vendedor' => $id_vendedor]);
        return $loja ? $loja->getId() : null;
    }
}
?>
