<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['submit'])) {
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $clienteDAO = new ClienteDAO();

    if ($clienteDAO->autenticar($email, $senha)){
        header('location: molde-com-conta.php');
        exit(); 
    } else {
        header('Location: login.php');
        exit(); 
    }
} else {
    echo "Requisição inválida.";
}
?>
