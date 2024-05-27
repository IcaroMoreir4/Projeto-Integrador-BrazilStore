<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['submit'])) {
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $clienteDAO = new ClienteDAO();

    if ($clienteDAO->autenticar($email, $senha)){
<<<<<<< HEAD
        header('location: home.html');
=======
        header('location: molde-com-conta.php');
>>>>>>> 9a575cf5da9ab397bbcd54bcae205c070da183d2
        exit(); 
    } else {
        header('Location: index.html');
        exit(); 
    }
} else {
    echo "Requisição inválida.";
}
?>
