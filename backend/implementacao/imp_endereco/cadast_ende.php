<?php
    require_once(__DIR__ . '/../../classes/usuarios/endereco.php');
    require_once(__DIR__ . '/../../database/DAO/EnderecoDAO.php');

    session_start();

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO();
    
    //Logica para a DAO recber os dados.
    if (isset($_POST['cadast_ende'])) {
        $cadastra_enderecos = $dao->create($endereco);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_cliente = $_SESSION['user_id'];
        $nome_comp = $_POST['nome'];
        $telefone_end = $_POST['tele'];
        $logradouro = $_POST['logr'];
        $numero = $_POST['num'];
        $bairro = $_POST['barr'];
        $cep = $_POST['cep']; 
        $nome_cidade = $_POST['munp']; 
        $nome_estado = $_POST['uf']; 


    if (!empty($id_cliente) && !empty($nome_comp) && !empty($telefone_end) && !empty($logradouro) && !empty($numero) &&!empty($bairro) && !empty($cep) && !empty($nome_cidade) && !empty($nome_estado)) {
        $endereco = new Endereco(null, $id_cliente, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado);
        $dao->create($endereco);
        header('locate: endereco-cliente.php');
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
}
?>