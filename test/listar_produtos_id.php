<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
</head>
<body>

<?php
require_once('../backend/database/DAO/ProdutoDAO.php');

session_start();

if (isset($_SESSION['vendedor_id'])) {
    $id_vendedor = $_SESSION['vendedor_id'];
    $produtoDAO = new ProdutoDAO();
    $produtos = $produtoDAO->listarProdutosPorVendedor($id_vendedor);

    if ($produtos) {
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Categoria</th><th>Valor</th><th>Descrição</th><th>Peso</th><th>Tipo de Entrega</th></tr>";
        foreach ($produtos as $produto) {
            echo "<tr>";
            echo "<td>" . $produto['nome'] . "</td>";
            echo "<td>" . $produto['categoria'] . "</td>";
            echo "<td>" . $produto['valor'] . "</td>";
            echo "<td>" . $produto['descricao'] . "</td>";
            echo "<td>" . $produto['peso'] . "</td>";
            echo "<td>" . $produto['tipo_entrega'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum produto encontrado.";
    }
} else {
    echo "Por favor, faça login como vendedor antes de visualizar os produtos.";
}
?>

</body>
</html>
