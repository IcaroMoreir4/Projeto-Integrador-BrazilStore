<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
session_start();

if (isset($_SESSION['vendedor_id']))
    $id_vendedor = $_SESSION['vendedor_id'];
$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->listarProdutosPorVendedor($id_vendedor);

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
        <form action="pesquisar.php" method="get">
            <div class="search-container">
                <input type="search" maxlength="50" class="search-input" placeholder="Pesquisar">
                <img src="./imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
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
    <div class="linhau"></div>
    <div class="gridusuario">
        <div class="meuperfil">
            <div class="menu-user">
                <div class="menu-nome">
                    <div class="imgperfil"><img src="imagem/perfiluser.svg" alt=""></div>
                    <div class="nomeusuario">
                        <label class="font-1-m">Nome do usuario</label>
                        <a href="perfil.php" class="font-1-s"><img src="imagem/lapis.svg" alt="">Editar Perfil</a>
                    </div>
                </div>
                <div class="minha-conta">
                    <div class="minhacontabtn">
                        <img src="imagem/perfilMinhaConta.svg" alt="">
                        <p class="font-1-m">Minha Conta</p>
                    </div>
                    <div class="perfil-end">
                        <ul>
                            <li class="font-1-s"><a href="perfil.php">Perfil</a></li>
                            <li class="font-1-s"><a href="endereco-cliente.php">Endereço</a></li>
                        </ul>
                    </div>
                </div>
                <div class="minhas-compras">
                    <img src="imagem/compras.svg" alt="Purchases Icon">
                    <p class="font-1-m">Compras</p>
                </div>
                <div class="minhas-compras-texto">
                    <a class="font-1-s" href="minhas_compras.php">Minhas Compras</a>
                </div>

                <button onclick="openCadastroLoja()" class="venda-agora font-1-m">Venda agora</button>
            </div>
        </div>

        <div class="minhas-comprass">
    <div class="lista-compras">
        <div class="gridcompra">
            <?php if ($produtos) : ?>
                <?php foreach ($produtos as $produto) : ?>
                    <div class="compra">
                        <div class="compras-titulo">
                            <div class="comprastexto">
                                <h1 class="font-1-m">Brazil Store</h1>
                                <a href="https://rastreamento.correios.com.br/app/index.php" class="status-pedido font-1-m">A CAMINHO</a>
                            </div>
                        </div>
                        <div class="linhau"></div>
                        <div class="item-boxc">
                            <div class="img-item">
                                <img src="uploads/<?= htmlspecialchars($produto['image_path']) ?>" alt="Imagem da Compra">
                            </div>
                            <div class="item-infoc">
                                <p class="item-nomec font-1-l cor-c12"><?= htmlspecialchars($produto['nome']) ?></p>
                                <p class="item-valorc font-1-m cor-c9">R$<?= htmlspecialchars($produto['valor']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
    </div>

    <div id="popupBgLoja" class="popup-bg">
        <div id="popupLoginLoja" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closeLoginLoja()">&times;</span>
                <div class="popup-content">
                    <span class="close" onclick="closeLoginLoja()">&times;</span>
                    <h2 class="font-1-l">Entrar</h2>
                    <form action="login_vendedor.php" method="post">
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
                <p class="font-1-s">Ainda não é vendedor? <a class="font-1-s esqsenha" href="#" onclick="openCadastroLoja()">Cadastre-se</a></p>
            </div>
        </div>
    </div>

    <div id="popupBgCadastroLoja" class="popup-bg">
        <div id="popupCadastroLoja" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closeCadastroLoja()">&times;</span>
                <h2 class="font-1-l">Seja Vendedor</h2>
                <form action="cadastrar_vendedor.php" method="post">
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
                <p class="font-1-s">Já é vendedor? <a class="esqsenha" href="#" onclick="openLoginLoja()">Entrar</a></p>
            </div>
        </div>
    </div>


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
                <li><a href="./termos.php">Termos e Condições</a></li>
            </ul>
        </div>
        <div class="cop">
            <p class="font-2-m cor-10">BrazilStore © Alguns direitos reservados.</p>
        </div>
    </footer>

</body>

</html>