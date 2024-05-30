<?php 
require_once('../../classes/usuarios/cliente.php');
require_once('../../database/DAO/ClienteDAO.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $clienteDAO = new ClienteDAO();
    $user = $clienteDAO->autenticar($email, $senha);

    if ($user){
        $_SESSION['user_id'] = $user;
        header('Location: home.php');
        exit(); 
    } else {
        header('Location: index.php'); 
        exit(); 
    } 
} 
?>
