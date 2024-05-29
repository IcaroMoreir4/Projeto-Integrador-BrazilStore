<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $clienteDAO = new ClienteDAO();
    $user = $clienteDAO->autenticar($email, $senha);

    if ($user){
        $_SESSION['user_id'] = $row['id'];
        //echo $_SESSION['user_id']; //testes
        header('location: home.php');
        exit(); 
    } else {
        //echo'Usuario invalido'; //testes
        header('Location: index.php'); 
        exit(); 
    } 
} 
?>
