<?php

require_once('../backend/database/DAO/ProdutoDAO.php');
//require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php'); //Quando for colocar na pasta raiz.

$dao = new ProdutoDAO(); 

if (isset($_POST['submit_pesq'])) {
    $pesq_produto = $dao->query($consulta);
}

if ($_SERVER["REQUEST_METHOD"] == "get"){
    $consulta = $_POST['consulta'];
}

$totalProdutos = count($pesq_produto);
$midPoint = ceil($totalProdutos / 2);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de pesquisa</title>
</head>
<body>
    <h1>Barra de pesquisa</h1>
    <form action="pesquisar.php" method="get">
        <input type="text" name="consulta" placeholder="O que você procura hoje?">
        <button type="submit">Pesquisar</button>
    </form>


    <article class="">
        <h2 class="">Resultados</h2>
        <div class="">
            <div class="">
                <?php if (!empty($pesq_produto)): ?>
                    <?php for ($i = 0; $i < $midPoint; $i++): ?>
                        <div class="">
                            <div class="">
                                <img class="favorite" src="./imagem/favoritar-vazado-plus.svg" alt="Favoritar">
                                <img src="./imagem/camisa-neymar-grande-psemelhantes.svg" alt="<?= htmlspecialchars($produtos[$i]->nome) ?>">
                            </div>
                            <div class="item_content">
                                <div class="content_flex">
                                    <h2 class="font-1-m-b"><?= htmlspecialchars($produtos[$i]->nome) ?></h2>
                                    <p class="font-1-m cor-p6">R$ <?= number_format($produtos[$i]->valor, 2, ',', '.') ?></p>
                                </div>
                                <div class="content_flex">
                                    <div class="content_flex-sun">
                                        <img src="./imagem/estrela-amarela.svg" alt="Avaliação">
                                        <p class="font-1-m">4.8</p>
                                    </div>
                                    <p class="font-1-m">300 vendidos</p>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <p>Nenhum produto encontrado.</p>
                <?php endif; ?>
            </div>
            <div class="itens-l2">
                <?php if (!empty($produtos)): ?>
                    <?php for ($i = $midPoint; $i < $totalProdutos; $i++): ?>
                        <div class="populares-item">
                            <div class="item_img">
                                <img class="favorite" src="./imagem/favoritar-vazado-plus.svg" alt="Favoritar">
                                <img src="./imagem/camisa-neymar-grande-psemelhantes.svg" alt="<?= htmlspecialchars($produtos[$i]->nome) ?>">
                            </div>
                            <div class="item_content">
                                <div class="content_flex">
                                    <h2 class="font-1-m-b"><?= htmlspecialchars($produtos[$i]->nome) ?></h2>
                                    <p class="font-1-m cor-p6">R$ <?= number_format($produtos[$i]->valor, 2, ',', '.') ?></p>
                                </div>
                                <div class="content_flex">
                                    <div class="content_flex-sun">
                                        <img src="./imagem/estrela-amarela.svg" alt="Avaliação">
                                        <p class="font-1-m">4.8</p> 
                                    </div>
                                    <p class="font-1-m">300 vendidos</p> 
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <p>Nenhum produto encontrado.</p>
                <?php endif; ?>
            </div>
        </div>
    </article>
</body>
</html>