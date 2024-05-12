<?php 
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/loja.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/LojaDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome_loja = $_POST['nome_loja'];
    $descricao = $_POST['descricao'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(isset($_SESSION['vendedor_id'])) {
        $id_vendedor = $_SESSION['vendedor_id'];

        if (!empty($nome_loja) && !empty($descricao) && !empty($email) && !empty($senha) && !empty($id_vendedor)) {
            $vendedorDAO = new VendedorDAO();
            
            
            if ($vendedorDAO->exists($id_vendedor)) {
                $loja = new Loja($nome_loja, $descricao, $email, $senha, $id_vendedor);
                $lojaDAO = new LojaDAO();
                $lojaDAO->create($loja);
                echo "Loja criada com sucesso!";
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
