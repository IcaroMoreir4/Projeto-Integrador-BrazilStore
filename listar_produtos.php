<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/conexao.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->read();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seu cabeçalho -->
</head>
<body>
    <header>
        <h1>Lista de Produtos</h1>
    </header>
    <main>
        <?php if (!empty($produtos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Tipo de Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars($produto->nome) ?></td>
                            <td><?= htmlspecialchars($produto->categoria) ?></td>
                            <td><?= htmlspecialchars($produto->valor) ?></td>
                            <td><?= htmlspecialchars($produto->descricao) ?></td>
                            <td><?= htmlspecialchars($produto->peso) ?></td>
                            <td><?= htmlspecialchars($produto->tipo_entrega) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>
