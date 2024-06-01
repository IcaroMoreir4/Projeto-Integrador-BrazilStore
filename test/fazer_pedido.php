<?php

require_once('../backend/database/DAO/CarrinhoDAO.php');

session_start();

// Inicializar a variável $total
$total = 0;

if (isset($_SESSION['id_item'])) {
    $id_item = $_SESSION['id_item'];
    $carrinhoDAO = new CarrinhoDAO();
    $itens_carrinho = $carrinhoDAO->read($id_item);

    if ($itens_carrinho){
        foreach ($itens_carrinho as $item) {
            $total += $item['valor'];
         }
        echo 'Total do carrinho: ' . $total;


        $_SESSION['comprar']->create_pedido($total);

        header('Location: compra.php');
            exit();

    } else {
        echo 'Nenhum item encontrado' . $valor;
    }
}

?>