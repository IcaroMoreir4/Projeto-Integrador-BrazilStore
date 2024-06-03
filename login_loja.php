<?php 
    session_start();
    require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/loja.php');
    require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/LojaDAO.php');

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $lojaDAO = new LojaDao();
        $loja = $lojaDAO->autenticar($email, $senha);

        if ($loja) {
            $_SESSION['loja_id'] = $loja->id;
            header('location: molde-com-conta.php');
            exit(); 
        } else {
            header('location: login_vendedor.php');
            exit();
        }
    }
?>
