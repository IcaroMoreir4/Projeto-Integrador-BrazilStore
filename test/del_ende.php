<?php 
    session_start();
    $_SESSION['user_id'] = 1; // Testes
    $_SESSION['end_id'] = 13; // Testes

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        echo 'Insira um id de usuario!'; // Testes
        //header('Location: index.php');
        exit();
    }

    require_once('../backend/database/DAO/EnderecoDAO.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $dao = new EnderecoDAO();
        $del_end = $dao->delete($id);
        echo 'Endereço deletado.';
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar endereços</title>
</head>
<body>
<h1>Apagar Endereço</h1>
    <form action="apagar_endereco.php" method="POST">
        <label for="id">Selecione o endereço a ser apagado:</label>
        <select name="id" id="id">
            <?php
            require_once 'EnderecoDAO.php';
            $enderecoDAO = new EnderecoDAO();
            $enderecos = $enderecoDAO->read();
            foreach ($enderecos as $endereco) {
                echo "<option value=\"{$endereco['id']}\">{$endereco['rua']}, {$endereco['cidade']}, {$endereco['estado']}, {$endereco['cep']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Apagar">
    </form>
</body>
</html>