<?php
    require_once('../backend/classes/usuarios/endereco.php');
    require_once('../backend/database/DAO/EnderecoDAO.php');

    session_start();

    $dao = new EnderecoDAO();

    //Logica para implementar com a DAO para cadastra um endereço.
    if (isset($_POST['cadastra_endereco'])) {
        $cadastra_enderecos = $dao->create($endereco);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $tele = $_POST['tele'];
        $logr = $_POST['logr'];
        $num = $_POST['num'];
        $bairro = $_POST['barr'];
        $cep = $_POST['cep']; 
        $munp = $_POST['munp']; 
        $uf = $_POST['uf']; 
    
    
        if (!empty($nome) && !empty($tele) && !empty($logr) && !empty($num)&& !empty($cep) && !empty($munp) && !empty($uf)) {
            $endereco = new Endereco(null, $nome, $tele, $logr, $num, $bairro, $cep, $munp, $uf);
            $dao->create($endereco);
            header('location: endereco.php');
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
<form action="endereco.php" method="post">
                    <label for="" class="">Nome</label>
                    <div class="nome">
                        <input class="campo" type="text" name="nome" id="cadas-nome" placeholder="Nome">
                    </div>

                    <label for="" class="">Telefone</label>
                    <div class="cpf">
                        <input class="campo" type="text" name="tele" id="cadas-cpf" placeholder="Telefone">
                    </div>

                    <label for="" class="">Logradouro</label>
                    <div class="telefone">
                        <input class="campo" type="text" name="logr" id="cadas-telefone" maxlength="12" placeholder="Logradouro">
                    </div>

                    <label for="" class="">Numero</label>
                    <div class="telefone">
                        <input class="campo" type="text" name="num" id="cadas-telefone" maxlength="12" placeholder="Numero">
                    </div>

                    <label for="" class="">Bairro</label>
                    <div class="telefone">
                        <input class="campo" type="text" name="barr" id="cadas-telefone" maxlength="12" placeholder="Bairro">
                    </div>

                    <label for="" class="">Cidade</label>
                    <div class="telefone">
                        <input class="campo" type="text" name="munp" id="cadas-telefone" maxlength="12" placeholder="Cidade">
                    </div>

                    <label for="" class="">Estado</label>
                    <div class="telefone">
                        <input class="campo" type="text" name="uf" id="cadas-telefone" maxlength="12" placeholder="Estado">
                    </div>

                    <label for="" class="">CEP</label>
                    <div class="telefone">
                        <input class="campo" type="text" name="cep" id="cadas-telefone" maxlength="12" placeholder="CEP">
                    </div>

                    <div class="">
                        <button type="submit">Cadastrar</button>
                    </div>
    </form>
</body>
</html>