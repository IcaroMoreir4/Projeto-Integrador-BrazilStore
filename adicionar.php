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
    <link rel="shortcut icon" href="imagem/logo.png" type="image/x-icon">
    <script src="javascript/script.js"></script>
</head>
<body>
    <header class="grid">
        <a href="index.php"><img class="logo-header" src="./imagem/logo.svg" alt=""></a>
        <div class="categoria_btn" id="categoriaBtn">
            <a class="cor-12 font-2-l categoria_content" href="#">Categorias <img src="imagem/arrow.svg" id="arrowIcon" alt=""></a>
            <div class="categoria_menu font-1-m" id="categoriaMenu">
                <a href="">Eletrônicos</a>
                <a href="">Vestuário</a>
                <a href="">Livros</a>
                <a href="">Jogos</a>
                <a href="">Acessórios</a>
            </div>
        </div>
        <form action="pesquisar.php" method="get">
            <div class="search-container">
                <input type="search" maxlength="50" class="search-input" placeholder="Pesquisar">
                <img src="imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
            </div>
        </form>
        <a href=""><img class="icon" src="imagem/carrinho.svg" alt=""></a>
        <a href="#" onclick="openPerfil()" id="userProfile"><img class="icon" src="imagem/user.svg" alt=""></a>
        <div class="perfil_btn" id="perfilBtn">
            <div class="perfil_menu font-1-m" id="perfilMenu">
                <a href="perfil.php">Meu perfil</a>
                <a href="logout.php">Sair da conta</a>
            </div>
        </div>
    </header>

    <div class="grid form-adicionar_bg">
        <form class="form-adicionar" action="cadastrar_produto.php" method="POST" enctype="multipart/form-data">
            <div class="adicionar-img">
                <input type="file" id="file-input" name="imagem" required>
                <label for="file-input">
                    <div class="icon-container">
                        <img src="imagem/camera.svg" alt="Ícone de Câmera" class="camera-icon">
                        <p class="font-1-l cor-12">Adicionar item</p>
                    </div>
                </label>
            </div>

            <div class="adicionar-info">
                <div class="col-span-2">
                    <label for="titulo" class=" font-1-m cor-12">Título</label>
                    <input maxlength="50" type="text" id="titulo" name="nome" required>
                </div>

                <div class="col-span-2">
                    <label for="descricao" class=" font-1-m cor-12">Descrição</label>
                    <textarea maxlength="300" id="descricao" name="descricao" class=" font-1-m cor-12" required></textarea>
                </div>
                
                <input type="hidden" name="vendedor_id" value="<?php echo isset($_SESSION['vendedor_id']) ? $_SESSION['vendedor_id'] : ''; ?>">

                <div class="col-1">
                    <label class="font-1-m cor-12 " for="preco">Preço</label>
                    <input class="" type="text" id="preco" name="valor" required>
                </div>

                    <div class="col-2">
                        <label class="font-1-m cor-12 " for="categoria">Categoria</label>
                        <select class="font-1-m" name="categoria" id="categoria" required>
                            <option value="eletronicos name="categoria" ">Eletrônicos</option>
                            <option value="vestuario" name="categoria">Vestuário</option>
                            <option value="livros" name="categoria" >Livros</option>
                            <option value="jogos" name="categoria" >Jogos</option>
                            <option value="acessorios" name="categoria" >Acessórios</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <p class="font-1-m "><strong>Importante:</strong> Para selecionar a opção correios ou transportadora, o seu produto deve ter até 6kg e estar dentro do limite de dimensões aceitas pela entregadora. Veja os <a class="cor-p1 link-termos" href="termos.html" target="_blank">termos aqui</a>.</p>
                    </div>
            
                    <div class="col-1">
                        <label class="font-1-m cor-12 " for="peso">Peso</label>
                        <select class="font-1-m" name="peso" id="peso" required>
                            <option value="1.00" name="peso">1g</option>
                            <option value="2.00" name="peso">2g</option>
                            <option value="3.00" name="peso">3g</option>
                            <option value="4.00" name="peso">4g</option>
                            <option value="5.00" name="peso">5g</option>
                            <option value="6.00" name="peso">6g</option>
                            <option value="7.00" name="peso">7g</option>
                        </select>
                    </div>

                    <div class="col-2">
                        <label class="font-1-m cor-12 " for="tipo_entrega">Tipo de Entrega</label>
                        <select class="font-1-m" name="tipo_entrega" id="tipo_entrega" required>
                            <option value="correios" name="tipo_entrega">Correios</option>
                        </select>
                        
                    </div>

                <button type="submit" class="btn_cheio btn_adc">Adicionar Item</button>
            </div>
        </form>
    </div>

    <footer class="grid">
        <div class="logo">
            <img src="imagem/BrazilStore.svg" alt="">
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
                    <a href="" target="_blank"><img src="imagem/instagram.svg" alt=""></a>
                    <!-- facebook -->
                    <a href="" target="_blank"><img src="imagem/facebook.svg" alt=""></a>
                    <!-- youtube -->
                    <a href="" target="_blank"><img src="imagem/youtube.svg" alt=""></a>
                </div>
            </ul>
        </div>
        <div class="informacoes">
            <h2 class="font-2-l">INFORMAÇÕES</h2>
            <ul class="font-2-m">
                <li><a href="">Eletrônicos</a></li>
                <li><a href="">Vestuário</a></li>
                <li><a href="">Livros</a></li>
                <li><a href="">Jogos</a></li>
                <li><a href="termos.html">Termos e Condições</a></li>
            </ul>
        </div>
        <div class="cop">
            <p class="font-2-m cor-10">BrazilStore © Alguns direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
