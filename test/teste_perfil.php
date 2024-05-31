<?php
    require_once(__DIR__ . '/../backend/database/DAO/ClienteDAO.php');
    
    $_SESSION['user_id'] = 1; // Teste

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        echo 'Insira um id de usuario!'; // Teste
        //header('Location: index.php');
        exit();
    }

    $dao = new ClienteDAO;

    //Função para consultar os endereços cadastrados.
    if (isset($_GET['exibir_perfil'])) {
        $id_cliente = $_SESSION['user_id'];
        $exibir_perfil = $dao->read($id_cliente);
    }

    //Editar perfil
    if(isset($_POST['editar_perfil'])){
        $id = $_SESSION['user_id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $editar_perfil = $dao->uptade($id, $nome, $email, $senha, $telefone);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilo para ocultar os inputs inicialmente */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!--Botão para exibir perfil-->
    <form action="teste_perfil.php" method="get">
        <button type="submit" name="exibir_perfil"> Exibir perfil</button>
    </form>

    <?php if (!empty($exibir_perfil)): ?>
        <td>
            <tr>Nome:  </tr><?php echo htmlspecialchars($exibir_perfil["nome"]); ?><br>
            <tr>E-mail:  </tr><?php echo htmlspecialchars($exibir_perfil["email"]); ?><br>
            <tr>CPF:  </tr><?php echo htmlspecialchars($exibir_perfil["cpf"]); ?><br>
            <tr>Telefone:  </tr><?php echo htmlspecialchars($exibir_perfil["telefone"]); ?>
        </td>
    <?php endif; ?> 


    <!--Inputs para editar perfil-->
    <br>
    <button name="" onclick="toggleInputs()">Editar perfil</button>
    
    <div id="inputs" class="hidden">
        <form action="teste_perfil.php" method="POST">
            <label for="" class="">Nome: </label>
            <div class="nome">
                 <input class="campo" type="text" name="nome" id="" maxlength="40" placeholder="Insira o seu nome">
            </div>

            <label for="" class="">E-mail: </label>
            <div class="email">
                <input class="campo" type="email" name="email" id="" maxlength="40" placeholder="Insira o seu email">
            </div>

            <label for="" class="">Telefone: </label>
            <div class="Telefone">
                <input class="campo" type="tel" name="telefone" id="" maxlength="11" placeholder="Insira o seu telefone">
            </div>

            <label for="" class="">Senha: </label>
            <div class="Senha">
                <input class="campo" type="password" name="senha" id="cadas-telefone" maxlength="40" placeholder="Insira o seu senha">
            </div>

            <div class="">
                <button name = "editar_perfil" type="submit">Alterar</button>
            </div>
        </form>
    </div>

    <script>
        function toggleInputs() {
            var inputsDiv = document.getElementById('inputs');
            if (inputsDiv.classList.contains('hidden')) {
                inputsDiv.classList.remove('hidden');
            } else {
                inputsDiv.classList.add('hidden');
            }
        }
    </script>
</body>
</html>