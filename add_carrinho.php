<?php

require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/pedido.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/carrinho_item.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/CarrinhoDAO.php');

session_start();

if(isset($_POST['add_carrinho'])){
    $id = $_POST['produto'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];

$produtoDAO = new ProdutoDAO();

$produto = $produtoDAO->getProdutoPorId($id);

if($produto) {
    $_SESSION['add_carrinho']->create_item($id, $tamanho, $cor);
    echo 'adicionado';
} else {

    echo "Produto não encontrado.";
}


}

?>