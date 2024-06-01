<?php
    require_once(__DIR__ . '/../backend/database/DAO/CarrinhoDAO.php');
    require_once(__DIR__ . '/../backend/classes/comercio/carrinho_item.php');

    session_start();
    $_SESSION['user_id'] = 1;
    $_SESSION['produ_id'] = 1;

    $dao = new CarrinhoDAO();

    if(isset($_POST['add_carrinho'])){
        $add_carrinho = $dao->create($carrinho);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_cliente = $_SESSION['user_id'];
        $id_produto = $_SESSION['produ_id'];
        $quantidade = $_POST['quant'];
        $tamanho = $_POST['tamanh'];
        $cor = $_POST['cor'];

        if (!empty($id_cliente) && !empty($id_produto) && !empty($quantidade) && !empty($tamanho) && !empty($cor)) {
            $carrinho = new carrinho(null, $id_cliente, $id_produto, $quantidade, $tamanho, $cor);
            $dao->create($carrinho);
            echo "Adicionado ao carrinho com sucesso.";//tete
            //header('location: apresentacao.php');
        } else {
            +$quantidade;
            $id = $_SESSION['produ_id'];
            $dao->update_item($quantidade, $id);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar ao carrinho</title>
</head>
<body>
    <form action="add_carrinho.php" method="post">
        <select id="" name="quant">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <br>
        <select id="" name="tamanh">
            <option value="PP">PP</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="GG">GG</option>
        </select>
        <br>
        <select id="" name="cor">
            <option value="Branca">Branca</option>
            <option value="Preta">Preta</option>
        </select>
        <br>
        <button type="submit">Adicionar ao carrinho</button>
    </form>
</body>
</html>