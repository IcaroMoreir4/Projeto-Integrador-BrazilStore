<?php
require_once(__DIR__ . '/../../database/DAO/CarrinhoDAO.php');

session_start();

$_SESSION['user_id'] = 1;//teste

//Proteção
if (!isset($_SESSION['user_id'])) {
    echo 'Insira um id de usuario!'; // Teste
    //header('Location: index.php');
    exit();
}

$dao = new CarrinhoDAO();

if(isset($_POST['add_carrinho'])){
    $_SESSION['user_id'] = $id_clinte;
    //$add_car = $dao->create_item();
}
?>