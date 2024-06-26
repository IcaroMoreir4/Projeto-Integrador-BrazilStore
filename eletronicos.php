<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->getByCategoria('eletronicos');
// Coloca aqui o nome da categoria para mostrar os outros produtos.
$totalProdutos = count($produtos);
$midPoint = ceil($totalProdutos / 2);
?>

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
        <a href="home.php"><img class="logo-header" src="./imagem/logo.svg" alt="Logo"></a>
        <div class="categoria_btn" id="categoriaBtn">
            <a class="cor-12 font-2-l categoria_content" href="#">Categorias <img src="./imagem/arrow.svg" id="arrowIcon" alt="Seta"></a>
            <div class="categoria_menu font-1-m" id="categoriaMenu">
                <a href="./eletronicos.php">Eletrônicos</a>
                <a href="./vestuario.php">Vestuário</a>
                <a href="./livros.php">Livros</a>
                <a href="./jogos.php">Jogos</a>
                <a href="./acessorios.php">Acessórios</a>
            </div>
        </div>
        <form action="pesquisar.php" method="get">
            <div class="search-container">
                <input type="search" maxlength="50" class="search-input" name="q" placeholder="Pesquisar">
                <img src="./imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
            </div>
        </form>
        <a href="./"><img class="icon" src="./imagem/carrinho.svg" alt="Carrinho"></a>
        <a href="#" onclick="openPerfil()" id="userProfile"><img class="icon" src="./imagem/user.svg" alt="Perfil"></a>
        <div class="perfil_btn" id="perfilBtn">
            <div class="perfil_menu font-1-m" id="perfilMenu">
                <a href="./perfil.php">Meu perfil</a>
                <a href="./logout.php">Sair da conta</a>
            </div>
        </div>
    </header>

    <article class="populares-home todos-itens grid">
        <h2 class="font-1-xl mgb-40 item-h2-geral">Eletrônicos</h2>
        <div class="populares-home_itens">
            <?php if (!empty($produtos)) : ?>
                <?php
                $totalProdutos = count($produtos);
                $linhaAtual = 1;
                for ($i = 0; $i < $totalProdutos; $i++) :
                    if ($i % 5 == 0) {
                        if ($i > 0) {
                            echo '</div>';
                        }
                        echo '<div class="itens-l' . $linhaAtual . ' mgb-40">';
                        $linhaAtual++;
                    }
                    if (isset($produtos[$i]['image_path']) && isset($produtos[$i]['nome']) && isset($produtos[$i]['valor'])) {
                        $imagePath = 'uploads/' . htmlspecialchars($produtos[$i]['image_path']);
                ?>
                        <a href="item.php?id=<?= htmlspecialchars($produtos[$i]['id']) ?>" class="populares-item">
                            <div class="item_img">
                                <img class="favorite" src="./imagem/favoritar-vazado-plus.svg" alt="Favoritar">
                                <img class="item-img-geral" src="<?= $imagePath ?>" alt="Imagem do Produto">
                            </div>
                            <div class="item_content">
                                <div class="content_flex">
                                    <h2 class="font-1-m-b"><?= htmlspecialchars($produtos[$i]['nome']) ?></h2>
                                    <p class="font-1-m cor-p6">R$ <?= number_format($produtos[$i]['valor'], 2, ',', '.') ?></p>
                                </div>
                                <div class="content_flex">
                                    <div class="content_flex-sun">
                                        <img src="./imagem/estrela-amarela.svg" alt="Avaliação">
                                        <p class="font-1-m">4.8</p>
                                    </div>
                                    <p class="font-1-m">300 vendidos</p>
                                </div>
                            </div>
                        </a>
                <?php
                    }
                endfor; ?>
        </div>
    <?php else : ?>
        <p class="font-1-s">Nenhum produto de eletrônicos encontrado.</p>
    <?php endif; ?>
    </div>
    </article>

    <footer class="grid">
        <div class="logo">
            <img src="./imagem/BrazilStore.svg" alt="Logo BrazilStore">
        </div>
        <div class="contato">
            <h2 class="font-2-l">CONTATO</h2>
            <ul class="font-2-m">
                <li><a href="wa.me/+5587999999999" target="_blank">+55 88 9999-9999</a></li>
                <li><a href="mailto:contato@brazilstore.com" target="_blank">contato@brazilstore.com</a></li>
                <div class="linha"></div>
                <li>Rua Ali Perto, 69 - Pirajá</li>
                <li>Juazeiro do Norte - CE</li>
                <div class="linha"></div>
                <div class="redes-sociais">
                    <a href="./" target="_blank"><img src="./imagem/instagram.svg" alt="Instagram"></a>
                    <a href="./" target="_blank"><img src="./imagem/facebook.svg" alt="Facebook"></a>
                    <a href="./" target="_blank"><img src="./imagem/youtube.svg" alt="YouTube"></a>
                </div>
            </ul>
        </div>
        <div class="informacoes">
            <h2 class="font-2-l">INFORMAÇÕES</h2>
            <ul class="font-2-m">
                <li><a href="./eletronicos.php">Eletrônicos</a></li>
                <li><a href="./vestuario.php">Vestuário</a></li>
                <li><a href="./">Livros</a></li>
                <li><a href="./">Jogos</a></li>
                <li><a href="./termos.php">Termos e Condições</a></li>
            </ul>
        </div>
        <div class="cop">
            <p class="font-2-m cor-10">BrazilStore © Alguns direitos reservados.</p>
        </div>
    </footer>
</body>

</html>