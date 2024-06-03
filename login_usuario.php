<?php 
session_start();

require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/admin.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

    $clienteDAO = new ClienteDAO();
    $clienteId = $clienteDAO->autenticar($email, $senha); // Obtenha o ID do cliente

    $administradorDAO = new AdiminDAO();
    $administradorId = $administradorDAO->autenticar($email, $senha); // Obtenha o ID do administrador

    if ($clienteId) {
        $_SESSION['user_id'] = $clienteId; // Armazene apenas o ID do cliente na sessão
        header('Location: home.php');
        exit();
    } elseif ($administradorId) {
        $_SESSION['admin_id'] = $administradorId; // Armazene apenas o ID do administrador na sessão
        header('location: dashboard_adm.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
} 
?>
