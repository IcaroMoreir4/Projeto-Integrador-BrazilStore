<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();

// Simulando a passagem do parâmetro categoria pela URL
$_GET['categoria'] = 'eletronicos'; // Altere para a categoria que deseja testar

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $produtos = $produtoDAO->getByCategoria($categoria);
    echo "<h1>Produtos da categoria '$categoria':</h1>";
    foreach ($produtos as $produto) {
        echo "Nome: " . $produto['nome'] . "<br>";
        echo "Categoria: " . $produto['categoria'] . "<br>";
        echo "Valor: R$ " . number_format($produto['valor'], 2, ',', '.') . "<br>";
        echo "------------------------<br>";
    }
} else {
    echo "Categoria não especificada.";
}
?>
