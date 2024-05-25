<?php
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$dao = new ProdutoDAO(); 

if(isset($_GET['termo'])) {
    $termo = $_GET['termo'];
    $produtos = $dao->query($termo);

    if (!empty($produtos)) {
        echo "<h2>Resultados da pesquisa:</h2>";
        echo "<ul>";
        foreach ($produtos as $produto) {
            echo "<li>" . $produto['nome']. "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum produto encontrado.";
    }
}

?>