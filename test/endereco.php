<?php
    require_once('../backend/database/DAO/EnderecoDAO.php');

    session_start();

    $dao = new EnderecoDAO();

    if (isset($_POST['exibirEnderecos'])) {
        $enderecos = $dao->read($id);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus endereços</title>
</head> 
<body>
    <h1>Meus endereços</h1>

    <form method="post">
        <button type="submit" name="exibirEnderecos">Meus endereços</button>
    </form>

    <?php if (isset($enderecos)): ?>
        <ul>
            <?php foreach ($enderecos as $endereco): ?>
                <li>
                    <?php echo $endereco->logradouro . ', ' . $endereco->numero; $endereco->bairro . ', ' . $endereco->cep ?> - 
                    <?php echo $endereco->nome_cidade . '/' . $endereco->nome_estado; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>