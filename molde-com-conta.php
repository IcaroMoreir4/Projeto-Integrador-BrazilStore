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
        <a href="index.php"><img class="logo-header" src="./imagem/logo.svg" alt=""></a>
        <div class="categoria_btn" id="categoriaBtn">
            <a class="cor-12 font-2-l categoria_content" href="#">Categorias <img src="./imagem/arrow.svg" id="arrowIcon" alt=""></a>
            <div class="categoria_menu font-1-m" id="categoriaMenu">
                <a href="./">Eletrônicos</a>
                <a href="./">Vestuário</a>
                <a href="./">Livros</a>
                <a href="./">Jogos</a>
                <a href="./">Acessórios</a>
            </div>
        </div>
        <form action="" method="">
            <div class="search-container">
                <input type="search" maxlength="50" class="search-input" placeholder="Pesquisar">
                <img src="./imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
            </div>
        </form>
        <a href="./carrinho.html"><img class="icon" src="./imagem/carrinho.svg" alt=""></a>
        <a href="./perfil.php" id="userImg"><img class="icon" src="./imagem/user.svg" alt=""></a>
    </header>

    <article class="grid">
        <?php
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

        $produtoDAO = new ProdutoDAO();
        $produtos = $produtoDAO->read();
        ?>
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="item-section">
                    <div class="item-opcoes">
                        <div class="item-opcao_maior">
                            <img src="./imagem/camisa.png" alt="Imagem do Produto">
                        </div>
                        <div class="item-opcao_menor">
                            <div class="opcao-menor_bg"><img src="./imagem/camisa.png" alt="Imagem do Produto"></div>
                            <div class="opcao-menor_bg"><img src="./imagem/camisa.png" alt="Imagem do Produto"></div>
                            <div class="opcao-menor_bg"><img src="./imagem/camisa.png" alt="Imagem do Produto"></div>
                        </div>
                    </div>
                    <div class="item-content">
                        <h1 class="font-1-xxl"><?= htmlspecialchars($produto->nome) ?></h1>
                        <div class="info-content">
                            <img src="./imagem/estrela-amarela.svg" alt="Estrela Avaliação">
                            <p class="font-2-l">4,8</p>
                            <p class="font-2-l">300 vendidos</p>
                        </div>
                        <h2 class="font-1-xxl cor-p6"><?= htmlspecialchars($produto->valor) ?></h2>
                        <p class="font-1-s cor-6 p-after"><?= htmlspecialchars($produto->descricao) ?></p>
                        <h2 class="font-1-l">Variante do produto</h2>
                        <div class="variante-prod">
                            <form class="opcoes-tamanho" action="">
                                <label class="font-1-m cor-8" for="tamanho">Tamanho</label>
                                <select class="font-1-m-b cor-8 op-tamanhos" id="tamanho" name="tamanho">
                                    <option value="p">P</option>
                                    <option value="m">M</option>
                                    <option value="g">G</option>
                                    <option value="gg">GG</option>
                                </select>
                            </form>
                            <form class="opcoes-cor opcoes-tamanho" action="">
                                <label class="font-1-m cor-8" for="cor">Cor</label>
                                <select class="font-1-m-b cor-8 op-tamanhos" id="cor" name="cor">
                                    <option value="branco">Branco</option>
                                    <option value="preto">Preto</option>
                                    <option value="cinza">Cinza</option>
                                </select>
                            </form>
                        </div>
                        <div class="btn-item">
                            <button class="btn_cheio btn_adc" type="button">Comprar Agora</button>
                            <button class="btn_vazado font-1-m-b" type="button">Adicionar ao Carrinho <img src="./imagem/adc-carrinho.svg" alt="Carrinho"></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </article> 

    <footer class="grid">
        <div class="logo">
            <img src="./imagem/BrazilStore.svg" alt="">
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
                    <a href="./" target="_blank"><img src="./imagem/instagram.svg" alt=""></a>
                    <a href="./" target="_blank"><img src="./imagem/facebook.svg" alt=""></a>
                    <a href="./" target="_blank"><img src="./imagem/youtube.svg" alt=""></a>
                </div>
            </ul>
        </div>
        <div class="informacoes">
            <h2 class="font-2-l">INFORMAÇÕES</h2>
            <ul class="font-2-m">
                <li><a href="./">Eletrônicos</a></li>
                <li><a href="./">Vestuário</a></li>
                <li><a href="./">Livros</a></li>
                <li><a href="./">Jogos</a></li>
                <li><a href="./termos.html">Termos e Condições</a></li>
            </ul>
        </div>
        <div class="cop">
            <p class="font-2-m cor-10">BrazilStore © Alguns direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
