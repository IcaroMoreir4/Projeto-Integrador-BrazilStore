<?php

require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

session_start();

if(isset($_SESSION['produto_id'])) {
    $id_produto = $_SESSION['produto_id'];
    $produtoDAO = new ProdutoDAO();
    $produto = $produtoDAO->presentation($produto); 
    
    if ($produto) {
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Categoria</th><th>Valor</th><th>Descrição</th><th>Avaliação</th></tr>"; // Corrigido para usar 'Avaliação' ao invés de 'Peso'
        
        
        foreach ($produto as $produto1) {
            echo "<tr>"; 
            echo "<td>" . $produto1['nome'] . "</td>";
            echo "<td>" . $produto1['categoria'] . "</td>";
            echo "<td>" . $produto1['valor'] . "</td>";
            echo "<td>" . $produto1['descricao'] . "</td>";
            echo "<td>" . $produto1['avaliacao'] . "</td>"; 
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto não definido.";
}
?>
