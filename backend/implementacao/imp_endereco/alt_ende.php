<?php
    require_once(__DIR__ . '/../../database/DAO/EnderecoDAO.php');

    session_start();
    
    //Proteção
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO;

    //Logica para a DAO recber os dados.
    if(isset($_POST['editar_end'])){
        $id = $_SESSION['end_id'];
        $nome_comp = $_POST['nome'];
        $telefone_end = $_POST['tele'];
        $logradouro = $_POST['logr'];
        $numero = $_POST['num'];
        $bairro = $_POST['barr'];
        $cep = $_POST['cep'];
        $nome_cidade = $_POST['munp'];
        $nome_estado = $_POST['uf'];

        $alt_end = $dao->update($id, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado);
        echo "Endereço atualizado com sucesso!";
    }
?>