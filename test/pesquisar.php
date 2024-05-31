<?php
require_once('../backend/database/DAO/ProdutoDAO.php');

$dao = new ProdutoDAO(); 

if (isset($_GET['pesquisa'])) {
    $consulta = $_GET['pesquisa'];
    $resultado = $dao->query($consulta);
}

$totalProdutos = count($resultado);
$midPoint = ceil($totalProdutos / 2);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de pesquisa</title>
</head>
<body>
    <h1>Barra de pesquisa</h1>
    <form action="pesquisar.php" method="get">
        <input type="text" name="pesquisa" placeholder="O que você procura hoje?">
        <button type="submit">Pesquisar</button>
    </form>

    <ul>
        <?php if (!empty($resultado)): ?>
            <?php for ($i = $midPoint; $i < $totalProdutos; $i++): ?>
                <li>
                    <p class=""><?= htmlspecialchars($resultado[$i]->nome); ?></p>
                    <p class="">R$ <?= number_format($resultado[$i]->valor, 2, ',', '.'); ?></p>
                </li>
            <?php endfor; ?>
        <?php else: ?>
            <li>Nenhum resultado encontrado.</li>
        <?php endif; ?>
    </ul>
</body>
</html>