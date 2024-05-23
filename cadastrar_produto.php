<?php 

require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $tipo_entrega = $_POST['tipo_entrega'];
    $imagem = $_POST['imagem'];

    if (!empty($nome) && !empty($categoria) && !empty($valor) && !empty($descricao) && !empty($peso) && !empty($tipo_entrega) && !empty($imagem)) {
       $produto = new produto($nome, $valor, $descricao, $categoria, $peso, $tipo_entrega, $imagem);
       $produtoDAO = new ProdutoDAO();
       $produtoDAO -> create($produto);

       header('location: listar_produtos.php');
    }else{
        echo "Por favor, preencha todos os campos do formulário.";
    }
    

}




?>