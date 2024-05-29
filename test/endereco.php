<?php
    session_start();
    $_SESSION['user_id'] = 1;
    //Proteção
    if (!isset($_SESSION['user_id'])) {
        header('Location: pesquisar.php');
        exit();
    }

    require_once('../backend/database/DAO/EnderecoDAO.php');

    $dao = new EnderecoDAO();

    //Função para consultar os endereços cadastrados.
    if (isset($_POST['exibirEnderecos'])) {
        $consut_enderecos = $dao->read($_SESSION['user_id']);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endereço</title>
</head> 
<body>
    <h1>Endereço</h1>
    <!--Html para ter o botão de consulta.-->
    <form method="post">
        <button type="submit" name="exibirEnderecos">Consultar endereços</button>
    </form>
    
    <br>
    
    <?php if (isset($consut_enderecos)): ?>
        <ul>
            <?php foreach ($consut_enderecos as $consut_enderecoss):?>
                <li>
                    <?php echo $consut_enderecos->logradouro . ', ' . $consut_enderecos->numero; $consut_enderecos->bairro . ', ' . $consut_enderecos->cep ?> - 
                    <?php echo $consut_enderecos->nome_cidade . '/' . $consut_enderecos->nome_estado; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>