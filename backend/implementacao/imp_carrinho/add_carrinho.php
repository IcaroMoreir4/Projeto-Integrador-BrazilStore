<?php
    require_once(__DIR__ . '/../../database/DAO/CarrinhoDAO.php');
    require_once(__DIR__ . '/../../classes/comercio/carrinho_item.php');

    session_start();

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }
    
    $dao = new CarrinhoDAO();

    if(isset($_POST['add_carrinho'])){
        $add_carrinho = $dao->create($carrinho);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_cliente = $_SESSION['user_id'];
        $id_produto = $_SESSION['produ_id'];
        $quantidade = $_POST['quant'];
        $tamanho = $_POST['tamanh'];
        $cor = $_POST['cor'];

        if (!empty($id_cliente) && !empty($id_produto) && !empty($quantidade) && !empty($tamanho) && !empty($cor)) {
            $carrinho = new carrinho(null, $id_cliente, $id_produto, $quantidade, $tamanho, $cor);
            $dao->create($carrinho);
            header('location: apresentacao.php');
        } else {
            +$quantidade;
            $id = $_SESSION['produ_id'];
            $dao->update_item($quantidade, $id);
        }
    }
?>