<?php
session_start();
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

if (!isset($_SESSION['vendedor_id'])) {
    header('Location: login.php');
    exit();
}

$id_vendedor = $_SESSION['vendedor_id'];
$produtoDao = new ProdutoDAO();
$produtos = $produtoDao->listarProdutosPorVendedor($id_vendedor);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Listagem de Produtos</title>
</head>

<body>
    <h1>Seus Produtos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['valor']; ?></td>
                <td><?php echo $produto['categoria']; ?></td>
                <td>
                    <a href="atualizar_produtos.php?id=<?php echo $produto['id']; ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>