<?php
    require_once(__DIR__ . '/../../classes/usuarios/endereco.php');
    require_once(__DIR__ . '/../../database/DAO/EnderecoDAO.php');

    session_start();
    //$_SESSION['user_id'] = 1; // Teste

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        //echo 'Insira um id de usuario!'; // Teste
        header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO;

    if(isset($_POST['alt_end'])){
        $alt_end = $dao->update($endereco);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $endereco = new endereco($id, $id_cliente, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estados);
        $endereco->setId($_SESSION['end_id']);
        $endereco->setId_cliente($_SESSION['user_id']);
        $endereco->setNome_comp($_POST['nome']);
        $endereco->setTelefone_end($_POST['tele']);
        $endereco->setLogradouro($_POST['logr']);
        $endereco->setNumero($_POST['num']);
        $endereco->setBairro($_POST['barr']);
        $endereco->setCep($_POST['cep']);
        $endereco->setNome_cidade($_POST['munp']);
        $endereco->setNome_estado($_POST['uf']);
        echo "Endereço atualizado com sucesso!";
    }
?>