<?php

require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produto = $produtoDAO->presentation($produto);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dados produto</title>
</head>
<body>
    <h1>Dados produto</h1>
    <ul>
    <?php if (!empty($produto)): ?>
        <ul>
            <li><strong>Nome:</strong> <?= htmlspecialchars($produto['nome']) ?></li>
            <li><strong>Categoria:</strong> <?= htmlspecialchars($produto['categoria']) ?></li>
            <li><strong>Valor:</strong> <?= htmlspecialchars($produto['valor']) ?></li>
            <li><strong>Descrição:</strong> <?= htmlspecialchars($produto['descricao']) ?></li>
            <li><strong>Peso:</strong> <?= htmlspecialchars($produto['peso']) ?></li>
            <li><strong>Tipo de Entrega:</strong> <?= htmlspecialchars($produto['tipo_entrega']) ?></li>
        </ul>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
</body>
</html>
</body>
</html>
