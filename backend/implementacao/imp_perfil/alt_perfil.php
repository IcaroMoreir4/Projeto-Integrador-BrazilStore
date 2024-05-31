<?php
    require_once(__DIR__ . '/../backend/database/DAO/ClienteDAO.php');
    
    $_SESSION['user_id'] = 1; // Teste

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        echo 'Insira um id de usuario!'; // Teste
        //header('Location: index.php');
        exit();
    }

    $dao = new ClienteDAO;

    //Editar perfil
    if(isset($_POST['editar_perfil'])){
        $id = $_SESSION['user_id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $editar_perfil = $dao->uptade($id, $nome, $email, $senha, $telefone);
    }
?>