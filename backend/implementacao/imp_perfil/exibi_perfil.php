<?php
    require_once(__DIR__ . '/../../database/DAO/ClienteDAO.php');

    session_start();

    //$_SESSION['user_id'] = 1; //teste

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        //echo 'Insira um id de usuario!'; //teste
        header('Location: index.php');
        exit();
    }

    $dao = new ClienteDAO;

    //Função para consultar os endereços cadastrados.
    if (isset($_GET['exibir_perfil'])) {
        $id_cliente = $_SESSION['user_id'];
        $exibir_perfil = $dao->read($id_cliente);
    }
?>