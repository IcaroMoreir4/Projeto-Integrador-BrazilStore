<?php
    session_start();
    $_SESSION['user_id'] = 1;

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        echo 'Insira um id de usuario!';
        //header('Location: index.php');
        exit();
    }

    require_once('../backend/database/DAO/EnderecoDAO.php');

    $dao = new EnderecoDAO();

    //Função para consultar os endereços cadastrados.
    $userId = $_SESSION['user_id'];
    if (isset($_POST['exibirEnderecos'])) {
        $consl_endereco = $dao->read($userId);
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
    <h1>Endereços Cadastrados</h1>

    <form method="post">
        <button type="submit" name="exibirEnderecos">Consultar endereços</button>
    </form>

    <table>
        <tbody>
            <?php if (isset($consl_endereco)): ?>
                    <tr>
                        <td><p>nome_comp</p><?php echo htmlspecialchars($consl_endereco['nome_comp']); ?></td>
                        <td><p>telefone_end</p><?php echo htmlspecialchars($consl_endereco['telefone_end']); ?></td>
                        <td><p>logradouro</p><?php echo htmlspecialchars($consl_endereco['logradouro']); ?></td>
                        <td><p>numero</p><?php echo htmlspecialchars($consl_endereco['numero']); ?></td>
                        <td><p>bairro</p><?php echo htmlspecialchars($consl_endereco['bairro']); ?></td>
                        <td><p>cep</p><?php echo htmlspecialchars($consl_endereco['cep']); ?></td>
                        <td><p>nome_cidade</p><?php echo htmlspecialchars($consl_endereco['nome_cidade']); ?></td>
                        <td><p>nome_estado</p><?php echo htmlspecialchars($consl_endereco['nome_estado']); ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Nenhum endereço encontrado.</td>
                    </tr>
            <?php endif; ?> 
        </tbody>
    </table>
</body>
</html>