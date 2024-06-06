<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/../../config/doctrine.php');

class EnderecoDAO {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    // Função para cadastrar um novo endereço
    public function create(Endereco $endereco) {
        $this->entityManager->persist($endereco);
        $this->entityManager->flush();
    }

    // Função para consultar os endereços cadastrados
    public function read($userId) {
        return $this->entityManager->getRepository(Endereco::class)->findBy(['id_cliente' => $userId]);
    }

    // Função para atualizar os endereços cadastrados
    public function update($id, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado) {
        $endereco = $this->entityManager->find(Endereco::class, $id);
        if ($endereco) {
            $endereco->setNomeComp($nome_comp);
            $endereco->setTelefoneEnd($telefone_end);
            $endereco->setLogradouro($logradouro);
            $endereco->setNumero($numero);
            $endereco->setBairro($bairro);
            $endereco->setCep($cep);
            $endereco->setNomeCidade($nome_cidade);
            $endereco->setNomeEstado($nome_estado);
            $this->entityManager->flush();
        }
    }

    // Função para excluir os endereços cadastrados
    public function delete($id) {
        $endereco = $this->entityManager->find(Endereco::class, $id);
        if ($endereco) {
            $this->entityManager->remove($endereco);
            $this->entityManager->flush();
        }
    }
}
?>
