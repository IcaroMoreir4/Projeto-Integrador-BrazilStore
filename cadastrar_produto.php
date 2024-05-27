<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $tipo_entrega = $_POST['tipo_entrega'];

    if(isset($_SESSION['vendedor_id'])) {
        $id_vendedor = $_SESSION['vendedor_id'];

        if (!empty($nome) &&  !empty($valor) && !empty($descricao) && !empty($categoria)&& !empty($peso) && !empty($tipo_entrega)   && !empty($id_vendedor)) {
            $vendedorDAO = new VendedorDAO();
        
            if ($vendedorDAO->exists($id_vendedor)) {
              $produto = new produto($nome, $valor,$descricao, $categoria,$peso, $tipo_entrega, $id_vendedor);
              $produtoDao = new ProdutoDAO();
              $produtoDao -> AdicionarProduto($produto);

              header('location: item.php');

            } else {
                echo "O ID do vendedor fornecido não existe.";
            }
        } else {
            echo "Por favor, preencha todos os campos do formulário.";
        }
    } else {
        echo "Por favor, faça login como vendedor antes de cadastrar uma loja.";
    }

}
    






?>