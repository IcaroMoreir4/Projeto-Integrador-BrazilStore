<?php

require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/pedido.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/carrinho_item.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/CarrinhoDAO.php');

session_start();

if(isset($_POST['comprar'])){
    $id = $_POST['produto'];
    $quant = $_POST['quantidade'];

    $add_item = new CarrinhoDAO();

    $_SESSION['comprar']->create_item($id, $quant);

    header('Location: carrinho.php');
        exit();
    } else {
        echo "Produto fora de estoque.";
}

if(isset($_POST['add_carrinho'])){
    $id = $_POST['produto'];
    $quant = $_POST['quantidade'];

    $add_item = new CarrinhoDAO();

    $_SESSION['add_carrinho']->create_item($id, $quant);
}

?>