<?php 

require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    if (!empty($nome) && !empty($categoria) && !empty($valor) && !empty($descricao)) {
       $produto = new produto($nome, $valor, $descricao, $categoria);
       $produtoDAO = new ProdutoDAO();
       $produtoDAO -> create($produto);

       echo 'Produto cadastrado!';
    }else{
        echo "Por favor, preencha todos os campos do formulário.";
    }
    

}




?>