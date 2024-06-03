<?php

require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/pedido.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/carrinho_item.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/CarrinhoDAO.php');

session_start();

if(isset($_POST['comprar'])){
    $id = $_POST['produto'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];

    $add_item = new CarrinhoDAO();

    $_SESSION['comprar']->create_item($id, $tamanho, $cor);

    header('Location: finalizar-compra.html');
        exit();
    } else {
        echo "Produto fora de estoque.";
}

if(isset($_POST['add_carrinho'])){
    $id = $_POST['produto'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];

    $add_item = new CarrinhoDAO();

    $_SESSION['add_carrinho']->create_item($id, $tamanho, $cor);
}

?>