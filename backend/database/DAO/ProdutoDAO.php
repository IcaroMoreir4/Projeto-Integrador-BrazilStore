
<?php
require_once(__DIR__ . '/../conexao.php');
require_once('ProdutoDAO.php');
require_once(__DIR__ . '/../../classes/comercio/produto.php');

class ProdutoDAO {
    public function create(Produto $produto) {
        $sql = 'INSERT INTO produto.produto (nome, categoria, valor, descricao, peso, tipo_entrega, path_image) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getPeso());
        $stmt->bindValue(6, $produto->getTipoEntrega());
        $stmt->bindValue(7, $produto->getImagePath());
        $stmt->execute();
    }
    
    public function read() {
        $sql = 'SELECT * FROM produto.produto';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(Produto $produto) {
        $sql = 'UPDATE produto.produto SET nome = ?, categoria = ?, valor = ?, descricao = ?, peso =?, tipo_entrega = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getId());
        $stmt->execute();
    }

    public function delete(Produto $produto) {
        $sql = 'DELETE FROM produto.produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getId());
        $stmt->execute();
    }

    //Barra de pesquisa
    public function query($consulta) {
        $sql = 'SELECT nome, valor FROM produto.produto WHERE nome LIKE :Consulta';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':Consulta', $consulta, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Apresentação do produto individual.
    public function presentation($produto){
        $sql = "SELECT produto.produto.*, avaliacao.avaliacao_produto.*
        FROM produto.produto 
        INNER JOIN avaliacao.avaliacao_produto ON produto.produto.id = avaliacao.avaliacao_produto.id_produto
        WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Produtos apresentados na tela inicial do site.
    public function home_avaliacao($produto){
        $sql = "SELECT AVG avaliacao.avaliacao_produto.quant_estrela FROM avaliacao.avaliacao_produto INNER JOIN produto.produto ON avaliacao.avaliacao_produto.id_produto = produto.produto.id WHERE id_produto = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function home_pedidos($produto){
        $sql = "SELECT SUM pedido.item_carrinho.quantidade FROM pedido.item_carrinho INNER JOIN produto.produto ON pedido.item_carrinho.quantidade.id_produto = produto.produto.id WHERE id_produto = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AdicionarProduto(Produto $produto) {
        $sql = 'INSERT INTO produto.produto (nome, categoria, valor, descricao, peso, tipo_entrega, id_vendedor, image_path) VALUES (?, ?, ?, ?, ?, ?, ?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getPeso());
        $stmt->bindValue(6, $produto->getTipoEntrega());
        $stmt->bindValue(7, $produto->getIdvendedor());
        $stmt->bindValue(8, $produto->getImagePath());
        $stmt->execute();
    }

    public function listarProdutosPorVendedor($id_vendedor) {
        $sql = "SELECT * FROM produto.produto WHERE id_vendedor = :id_vendedor";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['id_vendedor' => $id_vendedor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function AtualizarProdutos(Produto $produto) {
        $sql = 'UPDATE produto.produto SET nome = ?, categoria = ?, valor = ?, descricao = ?, peso = ?, tipo_entrega = ?, image_path = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getPeso());
        $stmt->bindValue(6, $produto->getTipoEntrega());
        $stmt->bindValue(7, $produto->getImagePath());
        $stmt->bindValue(8, $produto->getId());
        $stmt->execute();
    }

    public function buscarProdutoPorId($id) {
        $sql = 'SELECT * FROM produto.produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProdutoPorId($id) {
        $sql = 'SELECT * FROM produto.produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
}
?>
