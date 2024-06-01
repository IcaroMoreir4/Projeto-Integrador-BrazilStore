<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/admin.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->autenticar($email, $senha);

    $administradorDAO = new AdiminDAO();
    $administrador = $administradorDAO->autenticar($email, $senha);

    if ($cliente) {
        $_SESSION['user_id'] = $cliente;
        header('Location: home.php');
        exit();
    } elseif ($administrador) {
        $_SESSION['admin_id'] = $administrador;
        header('location: dashboard_adm.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
} 
?>