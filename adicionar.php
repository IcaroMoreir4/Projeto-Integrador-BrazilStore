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
    <a href="index.php"><a href="index.php"><img class="logo-header" src="./imagem/logo.svg" alt=""></a></a>
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


<article class="adiconar-bg grid">
    <div class="adicionar-head">
        <h1 class="font-1-xl">Vender é bom e todo mundo gosta</h1>
        <p class="font-1-m cor-9">capriche nas fotos e na descrição do seu produto</p>
    </div>

    <div class="adicionar-options">
        <form action="cadastrar_produto.php" method="post" enctype="multipart/form-data">
            <div class="adicionar-options_img">
                <input type="file" id="file-input" name="imagem" required>
                <label for="file-input">
                    <div class="icon-container">
                        <img src="./imagem/camera.svg" alt="Ícone de Câmera" class="camera-icon">
                        <p>Adicionar item</p>
                    </div>
                </label>
                <div class="adicionar-options_imgs">
                    <div class="options-imagem">
                        <img src="" alt="imagem">
                    </div>
                    <div class="options-imagem">
                        <img src="" alt="imagem">
                    </div>
                </div>
            </div>

            <div class="adicionar-options_geral">
                <label for="titulo" class="col-span-2 font-1-m cor-12">Título</label>
                <input maxlength="50" type="text" id="titulo" name="nome" class="col-span-2" required><br><br>

                <label for="descricao" class="col-span-2 font-1-m cor-12">Descrição</label>
                <textarea maxlength="300" id="descricao" name="descricao" class="col-span-2 font-1-m cor-12" required></textarea><br><br>
                
                <input type="hidden" name="vendedor_id" value="<?php echo $_SESSION['id_vendedor']; ?>">

                <label class="font-1-m cor-12" for="preco">Preço</label>
                <input type="text" id="preco" name="valor" required><br><br>

                <label class="font-1-m cor-12" for="categoria">Categoria</label>
                <input type="text" id="categoria" name="categoria" required><br><br>

                <p class="font-1-m"><strong>Importante:</strong> para selecione a opção correios ou transportadora, o seu produto deve ter até 6kg e estar dentro do limite de dimensões aceita pela entregadora. veja os <a class="cor-p1" href="./termos.html" target="_blank">termos aqui</a>.</p>
                
                <label class="font-1-m cor-12" for="peso">Peso</label>
                <input type="text" id="peso" name="peso" required><br><br>

                <label class="font-1-m cor-12" for="tipo_entrega">Tipo de Entrega</label>
                <input type="text" id="tipo_entrega" name="tipo_entrega" required><br><br>

                <button type="submit" class="btn_cheio btn_adc">Adicionar Item</button>
            </div>
        </form>
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
</footer>
