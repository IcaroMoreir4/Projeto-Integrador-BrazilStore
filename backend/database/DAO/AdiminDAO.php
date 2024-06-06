<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');

class AdminDAO {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create(Admin $admin) {
        $this->entityManager->persist($admin);
        $this->entityManager->flush();
    }

    public function read() {
        return $this->entityManager->getRepository(Admin::class)->findAll();
    }

    public function update(Admin $admin) {
        $existingAdmin = $this->entityManager->find(Admin::class, $admin->getId());
        if ($existingAdmin) {
            $existingAdmin->setEmail($admin->getEmail());
            $existingAdmin->setSenha($admin->getSenha());
            $this->entityManager->flush();
        }
    }

    public function delete($id) {
        $admin = $this->entityManager->find(Admin::class, $id);
        if ($admin) {
            $this->entityManager->remove($admin);
            $this->entityManager->flush();
        }
    }

    public function autenticar($email, $senha) {
        $admin = $this->entityManager->getRepository(Admin::class)->findOneBy([
            'email' => $email,
            'senha' => $senha
        ]);
        return $admin ? $admin->getId() : null;
    }

    public function VerTodosUsuarios() {
        return $this->entityManager->getRepository(Usuario::class)->findAll();
    }

    public function VerTodosVendedores() {
        return $this->entityManager->getRepository(Vendedor::class)->findAll();
    }

    public function VerTodasLojas() {
        return $this->entityManager->getRepository(Loja::class)->findAll();
    }

    public function deleteUsuario($idUsuario) {
        $usuario = $this->entityManager->find(Usuario::class, $idUsuario);
        if ($usuario) {
            $this->entityManager->remove($usuario);
            $this->entityManager->flush();
        }
    }

    public function deleteVendedor($idVendedor) {
        $vendedor = $this->entityManager->find(Vendedor::class, $idVendedor);
        if ($vendedor) {
            $this->entityManager->remove($vendedor);
            $this->entityManager->flush();
        }
    }

    public function deleteLoja($idLoja) {
        $loja = $this->entityManager->find(Loja::class, $idLoja);
        if ($loja) {
            $this->entityManager->remove($loja);
            $this->entityManager->flush();
        }
    }

    public function VerTodosProdutos() {
        return $this->entityManager->getRepository(Produto::class)->findAll();
    }
}
?>
