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
                    <img src="uploads/<?= htmlspecialchars($produto['image_path']) ?>" alt="Imagem do Produto">
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
                    <a class="btn_vazado btn_edit" href="atualizar_produtos.php?id=<?php echo $produto['id']; ?>">Editar</a>
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

        <a class="button_sair cor-12 font-1-m" href="logout.php">Sair</a>

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
                    <li><a href="./termos.php">Termos e Condições</a></li>
                </ul>
            </div>
            <div class="cop">
                <p class="font-2-m cor-10">BrazilStore © Alguns direitos reservados.</p>
            </div>
        </footer>

</body>
</html>
