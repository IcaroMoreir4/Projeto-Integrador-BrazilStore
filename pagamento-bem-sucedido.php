<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="description"
      content="BrazilStore. Os melhores que está tendo!"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BrazilStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <link rel="preload" href="./css/style.css" as="style" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./imagem/logo.png" type="image/x-icon" />
    <script src="./javascript/script.js"></script>
  </head>
  <body>
    
    <header class="grid">
        <a href="home.php"><img class="logo-header" src="./imagem/logo.svg" alt=""></a>
        <div class="categoria_btn" id="categoriaBtn">
            <a class="cor-12 font-2-l categoria_content" href="#">Categorias <img src="./imagem/arrow.svg" id="arrowIcon" alt=""></a>
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
                <input type="search" maxlength="50" class="search-input" placeholder="Pesquisar">
                <img src="./imagem/busca.svg" alt="Ícone de Lupa" class="search-icon" onclick="submitForm()">
            </div>
        </form>
            
            <a href="./"><img class="icon" src="./imagem/carrinho.svg" alt=""></a>
            <a href="#" onclick="openLogin()" id="userImg"><img class="icon" src="./imagem/user.svg" alt=""></a>
    </header>


    <section class="sessao">
        <div id="loading" class="loading">
            <img src="./imagem/carregando.gif" alt="Carregando..." />
            <h1 class="font-1-l">Processando pagamento</h1>
        </div>

        <div id="content" class="box-1" style="display: none;">
            <div class="imagem">
                <img src="./imagem/pagamento-bem-sucedido.svg" alt="" />
            </div>

            <h1 class="font-1-xxl">PAGAMENTO BEM SUCEDIDO</h1>

            <p class="font-1-m">
                Seu pagamento será realizado em 30 minutos. Se houver algum problema,
                converse com o atendimento ao cliente. Informações detalhadas
                incluirão abaixo.
            </p>

            <div class="btn-pagamentos">
                <a class="btn_cheio" href="./todos_itens.php">Continuar Comprando</a>
                <a class="btn_vazado" href="./">Detalhe da Compra</a>
            </div>
        </div>
    </section>


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
