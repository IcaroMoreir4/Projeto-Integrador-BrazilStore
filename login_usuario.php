<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $clienteDAO = new ClienteDAO();

    if ($clienteDAO->autenticar($email, $senha)){
        header('location: home.html');
        exit(); 
    } else {
        header('Location: index.html');
        exit(); 
    }
} else {
    echo "Requisição inválida.";
}
?>
