<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar pedidos</title>
</head>
<body>


<?php
require_once('../backend/database/DAO/PedidoDAO.php');

session_start();

if (isset($_SESSION['cliente_id'])) { // Corrigido para 'cliente_id'
    $id_cliente = $_SESSION['cliente_id']; // Corrigido para 'cliente_id'
    $pedidoDAO = new PedidoDAO();
    $pedidos = $pedidoDAO->listarPedidosPorCliente($id_cliente);

    if ($pedidos) {
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Categoria</th><th>Valor</th><th>Descrição</th><th>Peso</th><th>Tipo de Entrega</th></tr>";
        foreach ($pedidos as $pedido) {
            echo "<tr>";
            echo "<td>" . $pedido['nome'] . "</td>";
            echo "<td>" . $pedido['categoria'] . "</td>";
            echo "<td>" . $pedido['valor'] . "</td>";
            echo "<td>" . $pedido['descricao'] . "</td>";
            echo "<td>" . $pedido['peso'] . "</td>";
            echo "<td>" . $pedido['tipo_entrega'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum pedido encontrado.";
    }
} else {
    echo "Por favor, faça login como cliente antes de visualizar os pedidos.";
}
?>
