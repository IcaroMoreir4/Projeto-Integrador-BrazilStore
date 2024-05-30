<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="BrazilStore. Os melhores que está tendo!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrazilStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preload" href="./css/style.css" as="style">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagem/logo.png" type="image/x-icon">
    <script src="./javascript/script.js"></script>

</head>
<body>

    <header class="grid">
        
    </header>
    <article class="grid">
        <?php
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
        session_start();

        if (isset($_SESSION['vendedor_id'])) {
            $id_vendedor = $_SESSION['vendedor_id'];
            $produtoDAO = new ProdutoDAO();
            $produtos = $produtoDAO->listarProdutosPorVendedor($id_vendedor);

            if ($produtos) {
                foreach ($produtos as $produto) {
        ?>
        <div class="item-section">
            <div class="item-opcoes">
                <div class="item-opcao_maior">
                    <img src="./imagem/camisa.png" alt="Imagem do Produto">
                </div>
            </div>
            <div class="item-content">
                <h1 class="font-1-xxl"><?= htmlspecialchars($produto['nome']) ?></h1>
                <div class="info-content">
                </div>
                <h2 class="font-1-xxl cor-p6"><?= htmlspecialchars($produto['valor']) ?></h2>
                <p class="font-1-s cor-6 p-after"><?= htmlspecialchars($produto['descricao']) ?></p>
                <div class="btn-item">
                    <button class="btn_cheio btn_adc" type="button">Comprar Agora</button>
                    <button class="btn_vazado font-1-m-b" type="button">Adicionar ao Carrinho <img src="./imagem/adc-carrinho.svg" alt="Carrinho"></button>
                </div>
            </div>
        </div>
        <?php
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
        } else {
            echo "<p>Por favor, faça login como vendedor antes de visualizar os produtos.</p>";
        }
        ?>
    </article>
    <a href="logout.php">Sair</a>
    <footer class="grid">

     </footer>

</body>
</html>
