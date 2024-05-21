<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <ul>
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <li>
                    <strong>Nome:</strong> <?= htmlspecialchars($produto->nome) ?><br>
                    <strong>Categoria:</strong> <?= htmlspecialchars($produto->categoria) ?><br>
                    <strong>Valor:</strong> <?= htmlspecialchars($produto->valor) ?><br>
                    <strong>Descrição:</strong> <?= htmlspecialchars($produto->descricao) ?><br>
                    <strong>Peso:</strong> <?= htmlspecialchars($produto->peso) ?><br>
                    <strong>Tipo de Entrega:</strong> <?= htmlspecialchars($produto->tipo_entrega) ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </ul>
</body>
</html>
