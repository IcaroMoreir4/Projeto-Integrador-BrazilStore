<?php


require_once('../backend/database/DAO/ProdutoDAO.php');

session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $produtoDAO = new ProdutoDAO();
        $deletar_Produto = $produtoDAO->delete($id);
        echo 'Produto deletado.';

}else{
    echo 'Produto não encontrado';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar produto</title>
</head>
<body>
<h1>Apagar Produto</h1>
    <form action="apagar_produto.php" method="POST">
        <label for="id">Selecione o produto a ser apagado:</label>
        <select name="id" id="id">
            <?php
            require_once 'ProdutoDAO.php';
            $enderecoDAO = new ProdutoDAO();
            $enderecos = $produtoDAO->read();
            foreach ($produtoss as $produto) {
                echo "<option value=\"{$produto['id']}\">{$produto['categoria']}, {$produto['valor']},{$produto['tamanho']}, {$produto['descricao']}, {$produto['peso']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Apagar">
    </form>
</body>
</html>
