<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto_id'])) {
    $produtoId = $_POST['produto_id'];
    $produtoDao = new ProdutoDAO();

    if ($produtoDao->deleteById($produtoId)) {
        header("Location: pagamento-bem-sucedido.php?produto_id=" . $produtoId);
        exit();
    } else {
        echo "Erro ao comprar o produto.";
    }
} else {
    echo "ID do produto não fornecido.";
}
?>
