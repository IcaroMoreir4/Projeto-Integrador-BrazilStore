<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produto</title>
</head>
<body>




<?php

require_once('../backend/d0atabase/DAO/ProdutoDAO.php');

session_start();

if(isset($_SESSION['produto_id']))
    $id_produto = $_SESSION['produto_id'];
    $produtoDAO = new ProdutoDAO();
    $produto1 = $produtoDAO->presentation($produto);

    if ($produto1){
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Categoria</th><th>Valor</th><th>Descrição</th><th>Peso</th><th>Tipo de Entrega</th></tr>";
        foreach ($produto as $produto1){
            echo "<td>" . $produto1['nome'] . "</td>";
            echo "<td>" . $produto1['categoria'] . "</td>";
            echo "<td>" . $produto1['valor'] . "</td>";
            echo "<td>" . $produto1['descricao'] . "</td>";
            echo "<td>" . $produto1['avaliação'] . "</td>";
            echo "</tr>";

        }
        
    }else{
        echo "";
    }
        
    

?>
