<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
session_start();

if (!isset($_SESSION['vendedor_id'])) {
    echo "Você precisa estar logado para ver esta página.";
    exit;
}

$vendedorId = $_SESSION['vendedor_id'];
$vendedorDAO = new VendedorDAO();
$vendedor = $vendedorDAO->getVendedorById($vendedorId);

if (!$vendedor) {
    echo "Vendedor não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Vendedor</title>
</head>
<body>
    <h1>Perfil do Vendedor</h1>
    <p><strong>Nome:</strong> <?= htmlspecialchars($vendedor->nome) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($vendedor->email) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($vendedor->telefone) ?></p>
    <p><strong>CPF:</strong> <?= htmlspecialchars($vendedor->cpf) ?></p>

    <a href="logout.php"> sair</a>
</body>
</html>
