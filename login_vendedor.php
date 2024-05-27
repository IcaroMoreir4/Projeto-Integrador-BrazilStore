<?php 
session_start();
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/vendedor.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $vendedorDAO = new VendedorDAO();
    $vendedor = $vendedorDAO->autenticar($email, $senha);

    if ($vendedor){
        $_SESSION['vendedor_id'] = $vendedor->id;
        header('location: listar_produtos_teste.php');
        exit(); 
    } else {
        header('location: login_vendedor.php');
    }
}






?>