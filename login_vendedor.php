<?php 
session_start();
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/vendedor.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $vendedorDAO = new VendedorDAO();

    if ($vendedorDAO->autenticar($email, $senha)){
        
        $_SESSION['autenticado'] = true;
        echo "Login feito com sucessos!";
        exit(); 
    } else {
        header('location: login.php');
        
    }
}





?>