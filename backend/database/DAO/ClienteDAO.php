<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');

class ClienteDAO {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create(Cliente $cliente) {
        $this->entityManager->persist($cliente);
        $this->entityManager->flush();
    }

    public function read($id_cliente) {
        return $this->entityManager->find(Cliente::class, $id_cliente);
    }

    public function update($id, $nome, $email, $senha, $telefone) {
        $cliente = $this->entityManager->find(Cliente::class, $id);
        if ($cliente) {
            $cliente->setNome($nome);
            $cliente->setEmail($email);
            $cliente->setSenha($senha);
            $cliente->setTelefone($telefone);
            $this->entityManager->flush();
        }
    }

    public function delete(Cliente $cliente) {
        $existingCliente = $this->entityManager->find(Cliente::class, $cliente->getId());
        if ($existingCliente) {
            $this->entityManager->remove($existingCliente);
            $this->entityManager->flush();
        }
    }

    public function autenticar($email, $senha) {
        $cliente = $this->entityManager->getRepository(Cliente::class)->findOneBy([
            'email' => $email,
            'senha' => $senha
        ]);
        return $cliente ? $cliente->getId() : null;
    }

    public function session_id($id) {
        return $this->entityManager->find(Cliente::class, $id);
    }

    public function queryRequests($id_cliente) {
        $dql = 'SELECT p FROM Pedido p JOIN p.carrinho c WHERE c.id_cliente = :id_cliente';
        $query = $this->entityManager->createQuery($dql)->setParameter('id_cliente', $id_cliente);
        return $query->getResult();
    }

    public function enviarAlerta($idCliente, $mensagem) {
        $cliente = $this->entityManager->find(Cliente::class, $idCliente);
        if ($cliente) {
            $cliente->setAlerta($mensagem);
            $this->entityManager->flush();
        }
    }
}

?>
