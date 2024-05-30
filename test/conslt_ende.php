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
            <?php if (!empty($consl_ende)): ?>
                <?php foreach ($consl_ende as $consl_endes): ?>
                    <li>
                        <p>nome_comp</p><?php echo htmlspecialchars($consl_ende['nome_comp']); ?>
                        <p>telefone_end</p><?php echo htmlspecialchars($consl_ende['telefone_end']); ?>
                        <td><p>logradouro</p><?php echo htmlspecialchars($consl_ende['logradouro']); ?>
                        <p>numero</p><?php echo htmlspecialchars($consl_ende['numero']); ?>
                        <p>bairro</p><?php echo htmlspecialchars($consl_ende['bairro']); ?>
                        <p>cep</p><?php echo htmlspecialchars($consl_ende['cep']); ?>
                        <p>nome_cidade</p><?php echo htmlspecialchars($consl_ende['nome_cidade']); ?>
                        <p>nome_estado</p><?php echo htmlspecialchars($consl_ende['nome_estado']); ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                    <tr>
                        <p>Nenhum endereço encontrado.</p>
                    </tr>
            <?php endif; ?> 
        </tbody>
    </table>
</body>
</html>