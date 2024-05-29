<?php

require_once('../backend/d0atabase/DAO/ProdutoDAO.php');

session_start();

if(isset($_SESSION['produto_id']))
    $id_produto = $_SESSION['produto_id'];
    $produtoDAO = new ProdutoDAO();
    $produto1 = $produtoDAO->presentation($produto);

    if ($produto1){
        foreach ($produto as $produto1);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Dados produto</h1>
    <ul>
    <?php if (!empty($produto)): ?>
        <ul>
            <li>
                <?php echo $produto->nome; ?>
                <?php echo $produto->valor; ?>
            </li> 
        </ul>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <form action="detalhes_produto.php" method="get">
        <input type="hidden" name="id_produto" value="1">
        <button type="submit">Produto 1</button>
    </form>
    
    <form action="detalhes_produto.php" method="get">
        <input type="hidden" name="id_produto" value="2">
        <button type="submit">Produto 2</button>
    </form>
</body>
</html>