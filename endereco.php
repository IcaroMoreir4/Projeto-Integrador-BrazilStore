<?php

require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/vendedor.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/usuarios.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/EnderecoDAO.php');

session_start();

//Vizualizar os endereços cadastrados em "Meus endereços"
if(isset($_POST['meus_enderecos'])){
    $EnderecoDAO = new EnderecoDAO; 
    $endereco = $EnderecoDAO->read($id);

    if (count($endereco) > 0) {
        foreach ($endereco as $enderecos) {
            echo '<tr>';
            echo '<td>' . $enderecos->logradouro . '</td>';
            echo '<td>' . $enderecos->numero . '</td>';
            echo '<td>' . $enderecos->bairro . '</td>';
            echo '<td>' . $enderecos->cep . '</td>';
            echo '<td>' . $enderecos->nome_cidade . '</td>';
            echo '<td>' . $enderecos->nome_estado . '</td>';
            echo '</tr>';
        }

    } else {
         echo "Vocé não tem nenhum endereço cadastrado.";
    }
}

//Adicionar um endereço
if(isset($_POST['add_endereco'])){
    $add_endereco = new EnderecoDAO($logradouro, $numero, $bairro, $cep);
    $EnderecoDAO->create($endereco);
    echo "Endereço cadastrado com sucesso!";
}

//Alterar um endereço
if(isset($_POST['alt_endereco'])){
    $add_endereco = new EnderecoDAO($logradouro, $numero, $bairro, $cep);
    $EnderecoDAO->update($endereco);
    echo "Endereço alterado com sucesso!";
}

//Deleter um endereço
if(isset($_POST['delet_endereco'])){
    $add_endereco = new EnderecoDAO($id);
    $EnderecoDAO->delete($endereco);
    echo "Endereço deletado com sucesso!";
}

?>