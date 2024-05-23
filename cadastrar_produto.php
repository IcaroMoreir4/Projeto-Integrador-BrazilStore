<?php

require_once('../Projeto-Integrador-BrazilStore/backend/database/conexao.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Capturar o nome da imagem
        $imagem = $_FILES['imagem']['name'];
        
        // Criar o objeto Produto com os dados do formulário e o nome da imagem
        $produto = new Produto($_POST['nome'], $_POST['categoria'], $_POST['valor'], $_POST['descricao'], $_POST['peso'], $_POST['tipo_entrega'], $imagem);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->create($produto);
        
        header('Location: listar_produtos.php');
        exit;
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo 'Ocorreu um erro ao adicionar o produto.';
}
?>
