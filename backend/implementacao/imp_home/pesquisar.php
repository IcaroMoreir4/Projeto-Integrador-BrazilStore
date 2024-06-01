<?php
require_once(__DIR__ . '/../../database/DAO/ProdutoDAO.php');

$dao = new ProdutoDAO(); 

if (isset($_GET['pesquisa'])) {
    $consulta = $_GET['pesquisa'];
    $resultado = $dao->query($consulta);
}

$totalProdutos = count($resultado);
$midPoint = ceil($totalProdutos / 2);
?>