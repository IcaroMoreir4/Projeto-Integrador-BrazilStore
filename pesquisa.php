<?php
    require_once(__DIR__ . '/backend/implementacao/imp_home/pesquisar.php');
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
            <a href="home.php"><img class="logo-header" src="./imagem/logo.svg" alt=""></a>
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

            <form action="/backend/implementacao/imp_home/pesquisar.php" method="get">
                <div class="search-container">
                    <input type="text" name="pesquisa" maxlength="50" class="search-input" placeholder="Pesquisar">
                    <img type="submit" src="./imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
                </div>
            </form>

                <a href="./"><img class="icon" src="./imagem/carrinho.svg" alt=""></a>
                <a href="#" onclick="openPerfil()" id="userProfile"><img class="icon" src="./imagem/user.svg" alt=""></a>
                <div class="perfil_btn" id="perfilBtn">
                    <div class="perfil_menu font-1-m" id="perfilMenu">
                        <a href="./perfil.php">Meu perfil</a>
                        <a href="./logout.php">Sair da conta</a>
                    </div>
                </div>
        </header>
            
        <div id="popupBg" class="popup-bg">
        <div id="popupLogin" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closeLogin()">&times;</span>
                <form action="login_usuario.php" method="get">
                    <label for="login-email" class="font-1-m">Email</label>
                    <div class="email-l">
                        <input class="campo" type="email" name="login" id="login-email" placeholder="Email">
                    </div>
                    <label for="login-password" class="font-1-m">Senha</label>
                    <div class="senha-l">
                        <input class="campo" type="password" name="login-senha" id="login-password" placeholder="Senha">
                    </div>
                    <div class="esqsenha">
                        <a class="font-1-s" href="">Esqueceu a senha?</a>
                    </div>
                    <div class="but-entrar">
                        <button type="submit">ENTRAR</button>
                    </div>
                </form>
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

    <article class="">
        <ul>
            <?php if (!empty($resultado)): ?>
                <?php for ($i = $midPoint; $i < $totalProdutos; $i++): ?>
                    <li>
                        <p class=""><?= htmlspecialchars($resultado[$i]->nome); ?></p>
                        <p class="">R$ <?= number_format($resultado[$i]->valor, 2, ',', '.'); ?></p>
                    </li>
                <?php endfor; ?>
            <?php else: ?>
                <li>Nenhum resultado encontrado.</li>
            <?php endif; ?>
        </ul>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = button.getAttribute('data-product-id');
                    addToCart(productId);
                });
            });

            function addToCart(productId) {
                // Aqui você adicionaria o produto ao carrinho
                console.log('Produto adicionado ao carrinho:', productId);
                // Você pode adicionar mais lógica aqui, como exibir uma mensagem de confirmação
            }
        });
    </script>
</body>
</html>