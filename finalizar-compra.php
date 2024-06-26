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
    <script>
        function alterarQuantidade(element, increment) {
            const contadorElement = element.parentElement.querySelector('.contador');
            let quantidade = parseInt(contadorElement.innerText);
            quantidade += increment;
            if (quantidade < 1) {
                quantidade = 1;
            }
            contadorElement.innerText = quantidade;
        }
    </script>
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

    <main>
        <form action="codigo-finalizar-compra" method="post">

            <div class="conteudo-finalizar-compra">

                <div class="titulo-finalizar-compra">
                    <div class="titulo-conteudo">
                        <p class="font-1-xl">Finalizar compra</p>
                        <p class="font-1-l titulo-subtitulo">Veja seus produtos</p>
                    </div>
                </div>

                <div class="conteudo-principal">

                    <div class="lojaprodutos-listaprodutos-finalizar-compra">
                        <div class="lojas">
                            <div class="loja-1">
                                <div class="produtos">

                                    <div class="fotoloja-nomeloja">
                                        <div class="foto-loja">
                                            <p class="font-1-l">L</p>
                                        </div>
                                        <p class="font-1-l">Nome da Loja</p>
                                    </div>
                                    <div class="rev-produto-loja">
                                        <div class="checbox-produto">
                                            <input type="checkbox" id="merch-carrinho">
                                            <label for="merch-carrinho">
                                                <div class="checbox-produto-img">
                                                    <figure><img src="imagem/camisa-neymar-pequena-carrinho.svg" alt=""></figure>
                                                </div>
                                            </label>
                                            <div class="detalhes-rev-produto-loja">
                                                <p class="font-1-l">T-Shirt Front-End</p>
                                                <p class="font-1-m alteracao-desc-nome-loja">nome da loja</p>
                                                <p class="font-1-l alteracao-valor">R$ XXXX,XX</p>
                                            </div>
                                        </div>
                                        <div class="rev-produto-loja-botoes">
                                            <div class="butt-quantidade">
                                                <input type="button" value="-" class="font-2-l rev-butt-menos" onclick="alterarQuantidade(this, -1)">
                                                <p class="font-2-l contador" data-contador-id="1">1</p>
                                                <input type="button" value="+" class="font-2-l rev-butt-mais" onclick="alterarQuantidade(this, 1)">
                                            </div>
                                            <input type="button" id="apagar-item-lixeira" class="butt-apagar">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="fotoloja-nomeloja">
                                        <div class="foto-loja">
                                            <p class="font-1-l">L</p>
                                        </div>
                                        <p class="font-1-l">Nome da Loja</p>
                                    </div>
                                    <div class="rev-produto-loja">
                                        <div class="checbox-produto">
                                            <input type="checkbox" id="merch-carrinho">
                                            <label for="merch-carrinho">
                                                <div class="checbox-produto-img">
                                                    <figure><img src="imagem/camisa-neymar-pequena-carrinho.svg" alt=""></figure>
                                                </div>
                                            </label>
                                            <div class="detalhes-rev-produto-loja">
                                                <p class="font-1-l">T-Shirt Front-End</p>
                                                <p class="font-1-m alteracao-desc-nome-loja">nome da loja</p>
                                                <p class="font-1-l alteracao-valor">R$ XXXX,XX</p>
                                            </div>
                                        </div>
                                        <div class="rev-produto-loja-botoes">
                                            <div class="butt-quantidade">
                                                <input type="button" value="-" class="font-2-l rev-butt-menos" onclick="alterarQuantidade(this, -1)">
                                                <p class="font-2-l contador" data-contador-id="1">1</p>
                                                <input type="button" value="+" class="font-2-l rev-butt-mais" onclick="alterarQuantidade(this, 1)">
                                            </div>
                                            <input type="button" id="apagar-item-lixeira" class="butt-apagar">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="fotoloja-nomeloja">
                                        <div class="foto-loja">
                                            <p class="font-1-l">L</p>
                                        </div>
                                        <p class="font-1-l">Nome da Loja</p>
                                    </div>
                                    <div class="rev-produto-loja">
                                        <div class="checbox-produto">
                                            <input type="checkbox" id="merch-carrinho">
                                            <label for="merch-carrinho">
                                                <div class="checbox-produto-img">
                                                    <figure><img src="imagem/camisa-neymar-pequena-carrinho.svg" alt=""></figure>
                                                </div>
                                            </label>
                                            <div class="detalhes-rev-produto-loja">
                                                <p class="font-1-l">T-Shirt Front-End</p>
                                                <p class="font-1-m alteracao-desc-nome-loja">nome da loja</p>
                                                <p class="font-1-l alteracao-valor">R$ XXXX,XX</p>
                                            </div>
                                        </div>
                                        <div class="rev-produto-loja-botoes">
                                            <div class="butt-quantidade">
                                                <input type="button" value="-" class="font-2-l rev-butt-menos" onclick="alterarQuantidade(this, -1)">
                                                <p class="font-2-l contador" data-contador-id="1">1</p>
                                                <input type="button" value="+" class="font-2-l rev-butt-mais" onclick="alterarQuantidade(this, 1)">
                                            </div>
                                            <input type="button" id="apagar-item-lixeira" class="butt-apagar">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="loja-2">
                                <div class="produtos">
                                    <div class="fotoloja-nomeloja">
                                        <div class="foto-loja">
                                            <p class="font-1-l">L</p>
                                        </div>
                                        <p class="font-1-l">Nome da Loja</p>
                                    </div>
                                    <div class="rev-produto-loja">
                                        <div class="checbox-produto">
                                            <input type="checkbox" id="merch-carrinho">
                                            <label for="merch-carrinho">
                                                <div class="checbox-produto-img">
                                                    <figure><img src="imagem/camisa-neymar-pequena-carrinho.svg" alt=""></figure>
                                                </div>
                                            </label>
                                            <div class="detalhes-rev-produto-loja">
                                                <p class="font-1-l">T-Shirt Front-End</p>
                                                <p class="font-1-m alteracao-desc-nome-loja">nome da loja</p>
                                                <p class="font-1-l alteracao-valor">R$ XXXX,XX</p>
                                            </div>
                                        </div>
                                        <div class="rev-produto-loja-botoes">
                                            <div class="butt-quantidade">
                                                <input type="button" value="-" class="font-2-l rev-butt-menos" onclick="alterarQuantidade(this, -1)">
                                                <p class="font-2-l contador" data-contador-id="1">1</p>
                                                <input type="button" value="+" class="font-2-l rev-butt-mais" onclick="alterarQuantidade(this, 1)">
                                            </div>
                                            <input type="button" id="apagar-item-lixeira" class="butt-apagar">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="listas-de-produtos">
                            <p class="font-1-l">Lista de produtos</p>

                            <div class="item-1-lista">
                                <p class="font-1-m">Nome do item</p>
                                <p class="font-1-m">R$ XXXX</p>
                            </div>

                            <div class="item-2-lista">
                                <p class="font-1-m">Nome do item</p>
                                <p class="font-1-m">R$ XXXX</p>
                            </div>

                            <div class="item-3-lista">
                                <p class="font-1-m">Nome do item</p>
                                <p class="font-1-m">R$ XXXX</p>
                            </div>

                            <hr>

                            <div class="itens-lista-preco">
                                <p class="font-1-m">Preço total</p>
                                <p class="font-1-m">R$ XXXX</p>
                            </div>

                            <div class="itens-lista-desconto">
                                <p class="font-1-m">Preço total (desconto)</p>
                                <p class="font-1-m">R$ XXXX</p>
                            </div>

                            <div class="itens-lista-frete">
                                <p class="font-1-m">Frete</p>
                                <p class="font-1-m">R$ XXXX</p>
                            </div>

                            <hr>

                            <div class="preco-total">
                                <p class="font-1-l preco-total-titulo">Preço total</p>
                                <p class="font-1-l preco-total-total">R$ XXXX</p>
                            </div>

                            <input type="button" value="Código Promocional" class="font-1-m codigo-desconto">

                            <button type="submit" class="botao-comprar-agora-lista">COMPRAR AGORA</button>

                        </div>

                    </div>

                    <div class="produtos-semelhantes">
                        <div class="titulo-produtos-butt">
                            <div class="produtos-buttvejamais">
                                <p class="font-1-l titulo-produtossemelhantes">Produtos semelhantes</p>
                                <button class="butt-vejamais">
                                    <p class="butt-vejamais-p">VER MAIS +</p>
                                </button>
                            </div>
                        </div>

                        <div class="line-produtos-semelhantes">
                            <button type="submit" class="produto">
                                <div class="add-favoritos">
                                    <figure><img src="imagem/adicionar-favoritos.svg" alt=""></figure>
                                </div>

                                <figure class="merch-camisa"><img class="merch-camisa-img" src="imagem/merch-camisa-neymar.svg" alt=""></figure>

                                <div class="produto-descricao">
                                    <div class="produto-nome-valor">
                                        <p class="font-1-s produto-nome">T-Shirt Front-End</p>
                                        <p class="font-1-s produto-valor">R$ 25</p>
                                    </div>

                                    <div class="produto-avaliacao-vendas">
                                        <figure><img src="imagem/estrela-avaliacao.svg" alt=""></figure>
                                        <p class="font-1-s">4,8</p>
                                        <figure><img src="imagem/divisao-av-vendas.svg" alt=""></figure>
                                        <p class="font-1-s">300 vendidos</p>
                                    </div>
                                </div>
                            </button>

                            <button type="submit" class="produto">
                                <div class="add-favoritos">
                                    <figure><img src="imagem/adicionar-favoritos.svg" alt=""></figure>
                                </div>

                                <figure class="merch-camisa"><img class="merch-camisa-img" src="imagem/merch-camisa-neymar.svg" alt=""></figure>

                                <div class="produto-descricao">
                                    <div class="produto-nome-valor">
                                        <p class="font-1-s produto-nome">T-Shirt Front-End</p>
                                        <p class="font-1-s produto-valor">R$ 25</p>
                                    </div>

                                    <div class="produto-avaliacao-vendas">
                                        <figure><img src="imagem/estrela-avaliacao.svg" alt=""></figure>
                                        <p class="font-1-s">4,8</p>
                                        <figure><img src="imagem/divisao-av-vendas.svg" alt=""></figure>
                                        <p class="font-1-s">300 vendidos</p>
                                    </div>
                                </div>
                            </button>

                            <button type="submit" class="produto">
                                <div class="add-favoritos">
                                    <figure><img src="imagem/adicionar-favoritos.svg" alt=""></figure>
                                </div>

                                <figure class="merch-camisa"><img class="merch-camisa-img" src="imagem/merch-camisa-neymar.svg" alt=""></figure>

                                <div class="produto-descricao">
                                    <div class="produto-nome-valor">
                                        <p class="font-1-s produto-nome">T-Shirt Front-End</p>
                                        <p class="font-1-s produto-valor">R$ 25</p>
                                    </div>

                                    <div class="produto-avaliacao-vendas">
                                        <figure><img src="imagem/estrela-avaliacao.svg" alt=""></figure>
                                        <p class="font-1-s">4,8</p>
                                        <figure><img src="imagem/divisao-av-vendas.svg" alt=""></figure>
                                        <p class="font-1-s">300 vendidos</p>
                                    </div>
                                </div>
                            </button>

                            <button type="submit" class="produto">
                                <div class="add-favoritos">
                                    <figure><img src="imagem/adicionar-favoritos.svg" alt=""></figure>
                                </div>

                                <figure class="merch-camisa"><img class="merch-camisa-img" src="imagem/merch-camisa-neymar.svg" alt=""></figure>

                                <div class="produto-descricao">
                                    <div class="produto-nome-valor">
                                        <p class="font-1-s produto-nome">T-Shirt Front-End</p>
                                        <p class="font-1-s produto-valor">R$ 25</p>
                                    </div>

                                    <div class="produto-avaliacao-vendas">
                                        <figure><img src="imagem/estrela-avaliacao.svg" alt=""></figure>
                                        <p class="font-1-s">4,8</p>
                                        <figure><img src="imagem/divisao-av-vendas.svg" alt=""></figure>
                                        <p class="font-1-s">300 vendidos</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </main>

    <footer>
        <div class="img-foot">
            <a href=""><img src="imagem/BrazilStore.svg" alt=""></a>
        </div>
        <div class="contato">
            <h2 class="font-2-l-b">Contato</h2>
            <ul class="font-2-s">
                <li><a href="tel:+5588999999999">+55 88 9999-9999</a></li>
                <li><a href="mailto:agentavery@sample.com">contato@brazilstore.com</a></li>
                <li><a href="https://www.google.com/maps/place/Centro+Universitário+Paraíso+-+UniFAP/@-7.2057691,-39.3138787,17z/data=!3m1!4b1!4m6!3m5!1s0x7a178ad71080c59:0x5b2a22386c2711fd!8m2!3d-7.2057691!4d-39.3113038!16s%2Fg%2F1232zs5y?entry=ttu" target="_blank">Rua Ali Perto, 69 - Pirajá
                        Juazeiro do Norte - CE</a></li>
            </ul>
            <div class="redes">
                <a href=""><img src="imagem/instagram.svg" alt=""></a>
                <a href=""><img src="imagem/facebook.svg" alt=""></a>
                <a href=""><img src="imagem/youtube.svg" alt=""></a>
            </div>
        </div>
        <div class="informa">
            <h2 class="font-2-l-b">Informações</h2>
            <ul class="font-1-m">
                <li><a href="">Eletronicos</a></li>
                <li><a href="">Vestuarios</a></li>
                <li><a href="">Livros</a></li>
                <li><a href="">Jogos</a></li>
                <li><a href="">Termos e condições</a></li>
            </ul>
        </div>
        <div class="direitos">
            <p class="font-2-xs">BrazilStore © Alguns direitos reservados.</p>
        </div>
    </footer>
</body>

</html>