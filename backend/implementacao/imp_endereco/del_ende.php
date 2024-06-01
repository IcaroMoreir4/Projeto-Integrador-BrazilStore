<?php
    require_once(__DIR__ . '/../../database/DAO/EnderecoDAO.php');

    session_start();

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO;

    //Função para deletar o endereço.
    if (isset($_POST['del_ende'])){
        $del_ende = $dao->delete($_SESSION['ende_id']);
    }
?>