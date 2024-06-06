<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');
require_once(__DIR__ . '/../../classes/usuarios/Vendedor.php');

class VendedorDAO {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create(Vendedor $vendedor) {
        $this->entityManager->persist($vendedor);
        $this->entityManager->flush();
        return $vendedor->getId();
    }

    public function read() {
        return $this->entityManager->getRepository(Vendedor::class)->findAll();
    }

    public function update(Vendedor $vendedor) {
        $this->entityManager->merge($vendedor);
        $this->entityManager->flush();
    }

    public function delete(Vendedor $vendedor) {
        $vendedorToDelete = $this->entityManager->find(Vendedor::class, $vendedor->getId());
        if ($vendedorToDelete) {
            $this->entityManager->remove($vendedorToDelete);
            $this->entityManager->flush();
        }
    }

    public function autenticar($email, $senha) {
        $vendedor = $this->entityManager->getRepository(Vendedor::class)->findOneBy([
            'email' => $email,
            'senha' => $senha
        ]);

        return $vendedor ? $vendedor : false;
    }

    public function exists($id) {
        $vendedor = $this->entityManager->find(Vendedor::class, $id);
        return $vendedor !== null;
    }

    public function getVendedorById($id) {
        return $this->entityManager->find(Vendedor::class, $id);
    }

    public function enviarAlerta($idVendedor, $mensagem) {
        $vendedor = $this->entityManager->find(Vendedor::class, $idVendedor);
        if ($vendedor) {
            $vendedor->setAlerta($mensagem);
            $this->entityManager->flush();
        }
    }
}
?>
