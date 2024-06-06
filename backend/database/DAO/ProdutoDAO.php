<?php

require_once('.//Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produto;

class ProdutoDAO {
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create(Produto $produto) {
        $this->entityManager->persist($produto);
        $this->entityManager->flush();
    }
    
    public function read() {
        return $this->entityManager->getRepository(Produto::class)->findAll();
    }

    public function update(Produto $produto) {
        $this->entityManager->merge($produto);
        $this->entityManager->flush();
    }

    public function delete(Produto $produto) {
        $produtoToDelete = $this->entityManager->find(Produto::class, $produto->getId());
        if ($produtoToDelete) {
            $this->entityManager->remove($produtoToDelete);
            $this->entityManager->flush();
        }
    }

    public function query($consulta) {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('p')
                     ->from(Produto::class, 'p')
                     ->where('p.nome LIKE :consulta')
                     ->setParameter('consulta', '%' . $consulta . '%');
        return $queryBuilder->getQuery()->getResult();
    }

    public function presentation($produtoId) {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('p', 'a')
                     ->from(Produto::class, 'p')
                     ->join('p.avaliacoes', 'a')
                     ->where('p.id = :produtoId')
                     ->setParameter('produtoId', $produtoId);
        return $queryBuilder->getQuery()->getResult();
    }

    public function home_avaliacao($produtoId) {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('AVG(a.quant_estrela)')
                     ->from('App\Entity\AvaliacaoProduto', 'a')
                     ->where('a.id_produto = :produtoId')
                     ->setParameter('produtoId', $produtoId);
        return $queryBuilder->getQuery()->getSingleScalarResult();
    }

    public function home_pedidos($produtoId) {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('SUM(ic.quantidade)')
                     ->from('App\Entity\ItemCarrinho', 'ic')
                     ->where('ic.id_produto = :produtoId')
                     ->setParameter('produtoId', $produtoId);
        return $queryBuilder->getQuery()->getSingleScalarResult();
    }

    public function AdicionarProduto(Produto $produto) {
        $this->create($produto);
    }

    public function listarProdutosPorVendedor($id_vendedor) {
        return $this->entityManager->getRepository(Produto::class)->findBy(['id_vendedor' => $id_vendedor]);
    }

    public function AtualizarProdutos(Produto $produto) {
        $this->update($produto);
    }

    public function buscarProdutoPorId($id) {
        return $this->entityManager->find(Produto::class, $id);
    }

    public function getProdutoPorId($id) {
        return $this->entityManager->find(Produto::class, $id);
    }

    public function deleteById($id) {
        $produto = $this->entityManager->find(Produto::class, $id);
        if ($produto) {
            $this->delete($produto);
        }
    }

    public function getByCategoria($categoria) {
        return $this->entityManager->getRepository(Produto::class)->findBy(['categoria' => $categoria]);
    }
}
?>
