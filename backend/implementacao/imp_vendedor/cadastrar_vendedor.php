<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/vendedor.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf']; 

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone) && !empty($cpf)) {
        $vendedor = new vendedor($nome, $email, $cpf, $senha, $telefone, null);
        $vendedorDAO = new VendedorDAO();
        $vendedorId = $vendedorDAO->create($vendedor);

    
        if ($vendedorId) {

            $_SESSION['vendedor_id'] = $vendedorId;
            echo "Seja bem vindo vendedor, Aproveite e crie sua loja!";
        } else {
            echo "Erro ao criar o vendedor.";
        }
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
}
?>
