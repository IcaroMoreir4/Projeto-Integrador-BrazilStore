<?php 

require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $clienteDAO = new ClienteDAO();

    if ($clienteDAO->autenticar($email, $senha)){

        echo "Login feito com sucessos!";
        exit(); 
    } else {
        header('location: login.php');
        
    }
}





?>