<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
session_start();

if (!isset($_SESSION['vendedor_id'])) {
    header('Location: login.php');
    exit();
}

$id_vendedor = $_SESSION['vendedor_id'];
$produtoDao = new ProdutoDAO();

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $produto = $produtoDao->buscarProdutoPorId($id_produto);

    if ($produto['id_vendedor'] != $id_vendedor) {
        echo "Você não tem permissão para editar este produto.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $tipo_entrega = $_POST['tipo_entrega'];
    $image_path = $_POST['image_path'];

    $produto = new Produto($nome, $valor, $descricao, $categoria, $peso, $tipo_entrega, $id_vendedor);
    $produto->setId($id_produto);
    $produto->setImagePath($image_path);

    $produtoDao->AtualizarProdutos($produto);

    header('Location: listar_produtos_teste.php');
    exit();
} else {
    echo "Produto não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST" action="atualizar_produtos.php">
        <input type="hidden" name="id_produto" value="<?php echo $produto['id']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>"><br>
        <label>Categoria:</label>
        <input type="text" name="categoria" value="<?php echo $produto['categoria']; ?>"><br>
        <label>Valor:</label>
        <input type="text" name="valor" value="<?php echo $produto['valor']; ?>"><br>
        <label>Descrição:</label>
        <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea><br>
        <label>Peso:</label>
        <input type="text" name="peso" value="<?php echo $produto['peso']; ?>"><br>
        <label>Tipo de Entrega:</label>
        <input type="text" name="tipo_entrega" value="<?php echo $produto['tipo_entrega']; ?>"><br>
        <label>Image Path:</label>
        <input type="text" name="image_path" value="<?php echo $produto['image_path']; ?>"><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
