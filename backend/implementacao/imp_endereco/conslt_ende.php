<?php
    require_once(__DIR__ . '/../../classes/usuarios/endereco.php');
    require_once(__DIR__ . '/../../database/DAO/EnderecoDAO.php');

    session_start();
    //$_SESSION['user_id'] = 1; // Teste

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        //echo 'Insira um id de usuario!'; // Teste
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO;

    //Função para consultar os endereços cadastrados.
    if (isset($_GET['consl_ende'])) {
        $consl_ende = $dao->read($_SESSION['user_id']);
        $_SESSION['end_id'] = $consl_ende ['id'];
    }
?>