<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/LojaDAO.php');
session_start();

if (!isset($_SESSION['loja_id'])) {
    echo "Você precisa estar logado para ver esta página.";
    exit;
}

$loja = $_SESSION['loja_id'];
$lojaDAO = new LojaDao();
$loja = $lojaDAO->getLojaById($loja);

if (!$loja) {
    echo "Loja não encontrado.";
    exit;
}
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
                <a href="./"><img class="icon" src="./imagem/carrinho.svg" alt=""></a>
                <a href="#" onclick="openLogin()" id="userImg"><img class="icon" src="./imagem/user.svg" alt=""></a>
    </header>
    <div class="linhau"></div>
        <div class="gridusuario">
                <div class="meuperfil">
                    <div class="menu-user">
                    <div class="menu-nome">
                        <div class="imgperfil"><img src="imagem/perfiluser.svg" alt=""></div>
                            <div class="nomeusuario">
                            <label class="font-1-m">Nome do usuario</label>
                            <a href="#" class="font-1-s"><img src="imagem/lapis.svg" alt="">Editar Perfil</a>
                        </div>
                    </div>
                    <div class="minha-conta">
                        <div class="minhacontabtn">
                            <img src="imagem/perfilMinhaConta.svg" alt="">
                            <a class="font-1-m">Minha Conta</a>
                        </div>
                            <div class="perfil-end">
                            <ul>
                                <li class="font-1-s"><a href="perfil.html">Perfil</a></li>
                                <li class="font-1-s"><a href="endereço.html">Endereço</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="minhas-compras">
                        <img src="/imagem/compras.svg" alt="">
                        <a class="font-1-m" href="minhas_compras.html">Minhas Compras</a>
                    </div>
                    <div class="minha-loja">
                        <img src="/imagem/Minha-loja.svg" alt="">
                        <a class="font-1-m" href="minha_loja.html">Minha loja</a>
                    </div>
                    <div class="loja-venda">
                        <ul>
                            <li class="font-1-s"><a href="minha_loja.html">Loja</a></li>
                            <li class="font-1-s"><a href="minhas_vendas.html">Meus Produtos</a></li>
                        </ul>
                    </div>          
                    </div>
                </div>
        
        <div class="perfil-loja">
            <div class="loja-texto">
                <h1 class="font-2-l">Minha loja</h1>
                <p class="font-1-s">Gerenciar e proteger sua conta</p>
                <div class="linhau"></div>
            </div>

            <div class="painelloja">
            <div class="loja-perfil">
            <p class="font-1-s">Nome: <?= htmlspecialchars($loja->nome) ?></p>
            <p class="font-1-s">Email:<?= htmlspecialchars($loja->email) ?></p>
            </div>
                <div class="adicionar-perfil">
                    <img src="imagem/user.svg" alt="">
                    <div class="btn-perfil"><input class="file" type="file" accept="image/*"></div>
                </div>
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
                    <li><a href="./termos.html">Termos e Condições</a></li>
                </ul>
            </div>
            <div class="cop">
                <p class="font-2-m cor-10">BrazilStore © Alguns direitos reservados.</p>
            </div>
        </footer>

</body>
</html>