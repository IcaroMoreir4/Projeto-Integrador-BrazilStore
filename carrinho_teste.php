<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->read();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->read();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <article class="grid">
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="item-section">
                    <div class="item-opcoes">
                        <img src="uploads/<?= htmlspecialchars($produto->image_path) ?>" alt="Imagem do Produto">
                    </div>
                    <div class="item-content">
                        <h1><?= htmlspecialchars($produto->nome) ?></h1>
                        <p><?= htmlspecialchars($produto->descricao) ?></p>
                        <p>Preço: <?= htmlspecialchars($produto->preco) ?></p>
                        <!-- Formulário para adicionar ao carrinho -->
                        <form action="add_carrinho.php" method="POST">
                            <input type="hidden" name="produto" value="<?= $produto->id ?>">
                            <label for="tamanho">Tamanho:</label>
                            <select name="tamanho" id="tamanho">
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                            </select>
                            <label for="cor">Cor:</label>
                            <select name="cor" id="cor">
                                <option value="Branco">Branco</option>
                                <option value="Preto">Preto</option>
                                <option value="Azul">Azul</option>
                            </select>
                            <button type="submit" name="add_carrinho">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </article>
</body>
</html>

</body>
</html>
