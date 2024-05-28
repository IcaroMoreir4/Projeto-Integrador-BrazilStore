<?php
require_once('../backend/database/DAO/ProdutoDAO.php');

$dao = new ProdutoDAO(); 

$consulta = $_GET['consulta'];
$produtos = $dao->query($consulta);

/*
if(isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];
    $produtos = $dao->query($consulta);

    if (!empty($produtos)) {
        echo "<h2>Resultados da pesquisa:</h2>";
        echo "<ul>";
        foreach ($produtos as $produto) {
            echo "<li>";
            echo $produto->nome;
            echo number_format($produto->valor, 2, ',', '.');
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum produto encontrado.<p>";
    }
}
*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de pesquisa</title>
</head>
<body>
    <h1>Barra de pesquisa</h1>
    <form method="get">
        <input type="text" name="consulta" placeholder="O que você procura hoje?">
        <button type="submit">Pesquisar</button>
    </form>
    <?php if (isset($produtos)): ?>
        <h2>Resultados da pesquisa:</h2>
        <ul>
            <?php foreach ($produtos as $produto): ?>
                <li>
                    <?php echo $produto->nome; ?> - 
                    R$ <?php echo number_format($produto->valor, 2, ",", "."); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>