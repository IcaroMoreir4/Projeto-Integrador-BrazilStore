<?php
    require_once('../backend/classes/usuarios/endereco.php');
    require_once('../backend/database/DAO/EnderecoDAO.php');

    session_start();
    //$_SESSION['user_id'] = 1; // Teste

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        //echo 'Insira um id de usuario!'; // Teste
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO;

    //Função para deletar o endereço.
    if (isset($_POST['del_ende'])){
        $del_ende = $dao->delete($_SESSION['end_id']);
    }
?>