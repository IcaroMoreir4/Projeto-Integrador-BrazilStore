<?php
    require_once(__DIR__ . '/../../database/DAO/EnderecoDAO.php');

    session_start();

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO();

    //Função para consultar os endereços cadastrados e agregar o $_SESSION['ende_id'].
    if (isset($_GET['consl_ende'])) {
        $consl_ende = $dao->read($_SESSION['user_id']);

        if ($consl_ende) {
            $primeira_linha = $consl_ende[0];
            $ende_id = $primeira_linha['id'];
            $_SESSION['ende_id'] = $ende_id;
        }
    }

    $limite = 3;
?>