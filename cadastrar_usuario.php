<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf']; 


    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone) && !empty($cpf)) {
    
        $cliente = new Cliente($nome, $email, $cpf, $senha, $telefone, null);
        $clienteDAO = new ClienteDAO();
        $clienteDAO->create($cliente);
        header('location: index.php');
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
}
?>
