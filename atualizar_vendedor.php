<?php 
require_once('Projeto-Integrador-BrazilStore/backend/classes/usuarios/vendedor.php');
require_once('Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    $vendedor = new Vendedor($nome, $email, $cpf, $senha, $telefone, $vendedorId);
    $vendedorDAO->update($vendedor);

    echo "Perfil atualizado com sucesso!";
}



?>