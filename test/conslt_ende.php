<?php
    require_once('../backend/database/DAO/EnderecoDAO.php');
    require_once('../backend/classes/usuarios/endereco.php');

    session_start();
    $_SESSION['user_id'] = 1; // Testes

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        echo 'Insira um id de usuario!'; // Testes
        //header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO();

    //Função para consultar os endereços cadastrados.
    if (isset($_GET['consl_ende'])) {
        $consl_ende = $dao->read($_SESSION['user_id']);
        $_SESSION['end_id'] = $consl_ende ['id'];
    }

    //Função para deletar o endereço.
    if (isset($_POST['del_ende'])){
        $del_ende = $dao->delete($_SESSION['end_id']);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar/Deletar endereço</title>
</head> 
<body>
    <h1>Consultar/Deleta endereços cadastrados</h1>

    <form ction="conslt_ende.php" method="get">
        <button type="submit" name="consl_ende">Consultar endereços</button>
    </form>

    <form ction="conslt_ende.php" method="post">
        <button type="submit" name="del_ende">Excluir endereço</button>
    </form>

    <table>
        <tbody>
            <?php if (isset($consl_ende)): ?>
                    <tr>
                        <td><p>nome_comp</p><?php echo htmlspecialchars($consl_ende['nome_comp']); ?></td>
                        <td><p>telefone_end</p><?php echo htmlspecialchars($consl_ende['telefone_end']); ?></td>
                        <td><p>logradouro</p><?php echo htmlspecialchars($consl_ende['logradouro']); ?></td>
                        <td><p>numero</p><?php echo htmlspecialchars($consl_ende['numero']); ?></td>
                        <td><p>bairro</p><?php echo htmlspecialchars($consl_ende['bairro']); ?></td>
                        <td><p>cep</p><?php echo htmlspecialchars($consl_ende['cep']); ?></td>
                        <td><p>nome_cidade</p><?php echo htmlspecialchars($consl_ende['nome_cidade']); ?></td>
                        <td><p>nome_estado</p><?php echo htmlspecialchars($consl_ende['nome_estado']); ?></td>
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