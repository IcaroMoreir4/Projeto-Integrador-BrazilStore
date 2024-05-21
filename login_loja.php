<?php 
session_start();
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/loja.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/LojaDAO.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $senha =$_POST ['senha'];
    
    $lojaDAO = new LojaDao();

    if($lojaDAO->autenticar($email, $senha)){
        $_SESSION['autenticado'] = true;
        echo 'Sua loja';
        exit();
    }else{
        header('location: login_loja.html');
    }


}


?>