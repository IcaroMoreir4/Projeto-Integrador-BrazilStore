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
                <div class="imgperfil">
                    <img src="imagem/perfiluser.svg" alt="User Profile Image">
                </div>
                <div class="nomeusuario">
                    <label class="font-1-m">Nome do usuário</label>
                    <a href="#" class="font-1-s">
                        <img src="imagem/lapis.svg" alt="Edit Icon">Editar Perfil
                    </a>
                </div>
            </div>
            <div class="minha-conta">
                <div class="minhacontabtn">
                    <img src="imagem/perfilMinhaConta.svg" alt="Account Icon">
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
                <p class="font-1-m" >Minhas Compras</p>
            </div>
            <div class="minhas-compras-texto">
                <a class="font-1-s" href="Minhas Compras.html">Minhas Compras</a>
            </div>
            <div class="minha-loja">
                <img src="imagem/Minha-loja.svg" alt="Store Icon">
                <p class="font-1-m" href="listar_produtos_teste.php">Minha Loja</p>
            </div>
            <div class="loja-venda">
                <ul>
                    <li class="font-1-s"><a href="minha_loja.html">Loja</a></li>
                    <li class="font-1-s"><a href="#">Meus Produtos</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="meus-produtos">
    <div class="produtos-titulo">
        <div class="produtostexto">
            <h1 class="font-1-l">Meus Produtos</h1>
            <div class="adicionaritem">
                <button class="font-1-m-b" onclick="redirectToAdicionar()">ADICIONAR ITEM
                    <img src="imagem/+.svg" alt="Add Icon">
                </button>
            </div>
        </div>
        <div class="linhau"></div>
    </div>
    <div class="lista-produtos">
        <div class="gridproduto">
            <?php if ($produtos): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="editar_produto"> 
                        <img class="editar_img" src="./imagem/editar-item.svg" alt="">
                        <a class="btn_editar_produto" href="atualizar_produtos.php?id=<?php echo $produto['id']; ?>">
                        <div class="item-box">
                            <div class="img-item">
                                <img src="uploads/<?= htmlspecialchars($produto['image_path']) ?>" alt="Imagem do Produto">
                            </div>
                            <div class="item-info">
                                <p class="item-nome font-1-l cor-c12"><?= htmlspecialchars($produto['nome']) ?></p>
                                <p class="item-valor font-1-m cor-c9">R$<?= htmlspecialchars($produto['valor']) ?></p>
                            </div>
                        </div>
                    </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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