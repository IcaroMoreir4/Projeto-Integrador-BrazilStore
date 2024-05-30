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
    require_once('../backend/classes/usuarios/endereco.php');

    $dao = new EnderecoDAO;

    if(isset($_POST['alt_end'])){
        $alt_end = $dao->update($endereco);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $endereco = new endereco($id, $id_cliente, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estados);
        $endereco->setId($_SESSION['end_id']);
        $endereco->setId_cliente($_SESSION['user_id']);
        $endereco->setNome_comp($_POST['nome']);
        $endereco->setTelefone_end($_POST['tele']);
        $endereco->setLogradouro($_POST['logr']);
        $endereco->setNumero($_POST['num']);
        $endereco->setBairro($_POST['barr']);
        $endereco->setCep($_POST['cep']);
        $endereco->setNome_cidade($_POST['munp']);
        $endereco->setNome_estado($_POST['uf']);
        echo "Endereço atualizado com sucesso!";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar endereço</title>
    <style>
        /* Estilo para ocultar os inputs inicialmente */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<button name="alt_end" onclick="toggleInputs()">Alterar endereço</button>
    
    <div id="inputs" class="hidden">
        <form action="alt_ende.php" method="POST">
            <label for="" class="">Nome</label>
            <div class="nome">
                 <input class="campo" type="text" name="nome" id="" maxlength="40" placeholder="Nome">
            </div>

            <label for="" class="">Telefone</label>
            <div class="telefone">
                <input class="campo" type="tel" name="tele" id="" maxlength="11" placeholder="Telefone">
            </div>

            <label for="" class="">Logradouro</label>
            <div class="logradouro">
                <input class="campo" type="text" name="logr" id="" maxlength="40" placeholder="Logradouro">
            </div>

            <label for="" class="">Numero</label>
            <div class="numero">
                <input class="campo" type="number" name="num" id="cadas-telefone" placeholder="Numero">
            </div>

            <label for="" class="">Bairro</label>
            <div class="bairro">
                <input class="campo" type="text" name="barr" id="cadas-telefone" maxlength="bairro" placeholder="Bairro">
            </div>

            <label for="" class="">CEP</label>
            <div class="cep">
                <input class="campo" type="text" name="cep" id="cadas-telefone" maxlength="8" placeholder="CEP">
            </div>

            <label for="" class="">Cidade</label>
            <div class="cidade">
                <input class="campo" type="text" name="munp" id="cadas-telefone" maxlength="32" placeholder="Cidade">
            </div>

            <label for="" class="">Estado</label>
            <div class="estado">
                <input class="campo" type="text" name="uf" id="cadas-telefone" maxlength="16" placeholder="Estado">
            </div>

            <div class="">
                <button type="submit">Alterar</button>
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