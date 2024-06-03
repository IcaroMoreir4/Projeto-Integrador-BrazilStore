<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->read();
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
            <a href="index.php"><img class="logo-header" src="./imagem/logo.svg" alt=""></a>
            <div class="categoria_btn" id="categoriaBtn">
                <a class="cor-12 font-2-l categoria_content" href="#">Categorias <img src="./imagem/arrow.svg" id="arrowIcon" alt=""></a>
                <div class="categoria_menu font-1-m" id="categoriaMenu">
                    <a href="./vestuario.php">Vestuário</a>
                    <a href="./eletronicos.php">Eletrônicos</a>
                    <a href="./livros.php">Livros</a>
                    <a href="./jogos.php">Jogos</a>
                    <a href="./acessorios.php">Acessórios</a>
                </div>
            </div>
            <form action="pesquisar.php" method="get">
                <div class="search-container">
                    <input type="search" maxlength="50" class="search-input" placeholder="Pesquisar">
                    <img src="./imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
                </div>
            </form>
                
                <a href="./"><img class="icon" src="./imagem/carrinho.svg" alt=""></a>
                <a href="#" onclick="openLogin()" id="userImg"><img class="icon" src="./imagem/user.svg" alt=""></a>
        </header>
        
        <div id="popupBg" class="popup-bg">
            <div id="popupLogin" class="popup">
            <div class="popup-content">
            <span class="close" onclick="closeLogin()">&times;</span>
            <h2 class="font-1-l">Entrar</h2>

            <div class="popup-content">
                <span class="close" onclick="closeLogin()">&times;</span>

                <form action="login_usuario.php" method="post">
                    <label for="login-email" class="font-1-m">Email</label>
                    <div class="email-l">
                        <input class="campo" type="email" name="email" id="login-email" placeholder="Email" required>
                    </div>
                    <label for="login-password" class="font-1-m">Senha</label>
                    <div class="senha-l">
                        <input class="campo" type="password" name="senha" id="login-password" placeholder="Senha" required>
                    </div>
                    <div class="esqsenha">
                        <a class="font-1-s" href="">Esqueceu a senha?</a>
                    </div>
                    <div class="but-entrar">
                        <button type="submit" name="submit" class="submit-button">ENTRAR</button>
                    </div>
                </form>
            </div>
            <p class="font-1-s">Ainda não tem conta? <a class="font-1-s esqsenha" href="#" onclick="openCadastro()">Cadastre-se</a></p>
        </div>
    </div>
</div>

<div id="popupBgCadastro" class="popup-bg">
    <div id="popupCadastro" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeCadastro()">&times;</span>
            <h2 class="font-1-l">Cadastre-se</h2>
            <form action="cadastrar_usuario.php" method="post">
                <label for="cadas-nome" class="font-1-m">Nome</label>
                <div class="nome">
                    <input class="campo" type="text" name="nome" id="cadas-nome" placeholder="Nome">
                </div>
                <label for="cadas-cpf" class="font-1-m">CPF</label>
                <div class="cpf">
                    <input class="campo" type="text" name="cpf" id="cadas-cpf" placeholder="CPF">
                </div>
                <label for="cadas-telefone" class="font-1-m">Telefone</label>
                <div class="telefone">
                    <input class="campo" type="tel" name="telefone" id="cadas-telefone" maxlength="12" placeholder="Telefone">
                </div>
                <label for="cadas-email" class="font-1-m">Email</label>
                <div class="email-c">
                    <input class="campo" type="email" name="email" id="cadas-email" placeholder="Email">
                </div>
                <label for="cadas-senha" class="font-1-m">Senha</label>
                <div class="senha-c">
                    <input class="campo" type="password" name="senha" id="cadas-senha" placeholder="Senha">
                </div>
                <div class="but-cadas">
                    <button type="submit">Cadastre-se</button>
                </div>
            </form>
            <p class="font-1-s">Já possui conta? <a class="esqsenha" href="#" onclick="openLogin()">Entrar</a></p>
        </div>
    </div>
</div>

    <article class="conteudo-home grid">
        <div class="conteudo-home_direita">
            <h1 class="font-1-xxl">Conheça <br> nossa loja</h1>
            <p class="font-2-l cor-9">Agora que você está aqui, dê o próximo passo em direção às novidades e tendências exclusivas que selecionamos especialmente para você. Navegue, explore e descubra as maravilhas que nossa loja tem a oferecer. Felicidades e boas compras!</p>
        </div>
        <div class="conteudo-home_esquerda">
            <img src="./imagem/imagem-home.png" alt="">
        </div>
    </article>

    <article class="categorias grid">
        <h2 class="font-1-xl mgb-40">Categorias</h2>
        <nav class="categoria-nav">
            <div class="categorias-item">
                <a href="./eletronicos.php">
                    <img src="./imagem/eletronicos.svg" alt="">
                    <p class="font-1-l cor-12">Eletrônicos</p>
                </a>
            </div>
            <div class="categorias-item">
                <a href="./vestuario.php">
                    <img src="./imagem/vesturario.svg" alt="">
                    <p class="font-1-l cor-12">Vestuário</p>
                </a>
            </div>
            <div class="categorias-item">
                <a href="./livros.php">
                    <img src="./imagem/livros.svg" alt="">
                    <p class="font-1-l cor-12">Livros</p>
                </a>
            </div>
            <div class="categorias-item">
                <a href="./jogos.php">
                    <img src="./imagem/jogos.svg" alt="">
                    <p class="font-1-l cor-12">Jogos</p>
                </a>
            </div>
            <div class="categorias-item">
                <a href="./acessorios.php">
                    <img src="./imagem/acessorios.svg" alt="">
                    <p class="font-1-l cor-12">Acessórios</p>
                </a>
            </div>
        </nav>
    </article>

    <article class="populares-home grid">
        <h2 class="font-1-xl mgb-40">Produtos Populares</h2>

        <div class="populares-home_itens">
        <div class="itens-l1 mgb-40">
        <?php if (!empty($produtos)): ?>
            <?php for ($i = 0; $i < $midPoint; $i++): ?>
                <a href="item.php?id=<?= htmlspecialchars($produtos[$i]->id) ?>" class="populares-item">
                <div class="item_img">
                    <?php $favoriteImage = './imagem/favoritar-vazado-plus.svg'; ?>
                    <img class="favorite" src="<?= $favoriteImage ?>" alt="Favoritar">
                    <?php $productImage = 'uploads/' . htmlspecialchars($produtos[$i]->image_path); ?>
                    <img class="item-imagem" src="<?= $productImage ?>" alt="<?= htmlspecialchars($produtos[$i]->nome) ?>">
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
                </a>
            <?php endfor; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
        </div>
        <div class="itens-l2">
        <?php if (!empty($produtos)): ?>
            <?php for ($i = $midPoint; $i < $totalProdutos; $i++): ?>
                <a href="item.php?id=<?= htmlspecialchars($produtos[$i]->id) ?>" class="populares-item">
                <div class="item_img">
                    <?php $favoriteImage = './imagem/favoritar-vazado-plus.svg'; ?>
                    <img class="favorite" src="<?= $favoriteImage ?>" alt="Favoritar">
                    <?php $productImage = 'uploads/' . htmlspecialchars($produtos[$i]->image_path); ?>
                    <img class="item-imagem" src="<?= $productImage ?>" alt="<?= htmlspecialchars($produtos[$i]->nome) ?>">
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
                </a>
            <?php endfor; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
                </div>
            </div>
            <div class="home-ver_mais">
                <a class="btn_vazado font-1-m-b" href="todos_itens.php">Ver Mais <img src="./imagem/mais.svg" alt=""></a>
            </div>
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
                        <!-- instagram -->
                        <a href="./" target="_blank"><img src="./imagem/instagram.svg" alt=""></a>
                        <!-- facebook -->
                        <a href="./" target="_blank"><img src="./imagem/facebook.svg" alt=""></a>
                        <!-- youtube -->
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