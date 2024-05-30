<?php
    require_once('../backend/classes/usuarios/endereco.php');
    require_once('../backend/database/DAO/EnderecoDAO.php');

    session_start();
    $_SESSION['user_id'] = 1;

    //Proteção
    if (!isset($_SESSION['user_id'])) {
        echo 'Insira um id de usuario!';
        //header('Location: index.php');
        exit();
    }

    $dao = new EnderecoDAO();

    //Logica para implementar com a DAO para cadastra um endereço.
    if (isset($_POST['cadastra_endereco'])) {
        $cadastra_enderecos = $dao->create($endereco);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_cliente = $_SESSION['user_id'];
        $nome_comp = $_POST['nome'];
        $telefone_end = $_POST['tele'];
        $logradouro = $_POST['logr'];
        $numero = $_POST['num'];
        $bairro = $_POST['barr'];
        $cep = $_POST['cep']; 
        $nome_cidade = $_POST['munp']; 
        $nome_estado = $_POST['uf']; 
    
    
        if (!empty($id_cliente) && !empty($nome_comp) && !empty($telefone_end) && !empty($logradouro) && !empty($numero) &&!empty($bairro) && !empty($cep) && !empty($nome_cidade) && !empty($nome_estado)) {
            $endereco = new Endereco(null, $id_cliente, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado);
            $dao->create($endereco);
            echo "Endereço cadastrado.";
            //header('location: endereco.php');
        } else {
            echo "Por favor, preencha todos os campos do formulário.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra endereços</title>
</head>
<body>
<form action="cadas_ende.php" method="post">
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
                        <button type="submit">Cadastrar</button>
                    </div>
    </form>
</body>
</html>