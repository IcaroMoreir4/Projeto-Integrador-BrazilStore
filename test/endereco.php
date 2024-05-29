<?php
    session_start();

    // Verificar se o usuário está logado
    if (!isset($_SESSION['user_id'])) {
        echo 'Vocé não esta logado para acessar esta pagina.';
        //header('Location: index.php');
        //exit();
    }

    require_once('../backend/database/DAO/EnderecoDAO.php');

    $dao = new EnderecoDAO();

    //Função para consultar os endereços cadastrados.
    if (isset($_POST['exibirEnderecos'])) {
        $enderecos = $dao->read($_SESSION['user_id']);
    }
    
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
/*
    //Função para excluir os endereços.
    if (isset($_POST['excluir_endereco'])) {
        $cadastra_enderecos = $dao->delete($endereco);
        $id = 
        $del_end = new Endereco();
    }

    if ($_SERVER)
 */
    //Função para editar os endereços.
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

    <br>

    <!--Html para cadastra o endereço.-->
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

    <br>

    <form>

    </form>

</body>
</html>