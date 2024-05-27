<?php

require_once('../Projeto-Integrador-BrazilStore/backend/classes/
usuarios/cliente.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/vendedor.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/usuarios/usuarios.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/EnderecoDAO.php');

session_start();

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

?>