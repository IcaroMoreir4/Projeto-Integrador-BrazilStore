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
    $clienteId = $clienteDAO->autenticar($email, $senha);

    $administradorDAO = new AdiminDAO();
    $administradorId = $administradorDAO->autenticar($email, $senha); 

    if ($clienteId) {
        $_SESSION['user_id'] = $clienteId; 
        header('Location: home.php');
        exit();
    } elseif ($administradorId) {
        $_SESSION['admin_id'] = $administradorId;
        header('location: dashboard_adm.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
} 
?>
