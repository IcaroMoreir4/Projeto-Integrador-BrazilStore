<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->read();
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
        <img class="logo-header" src="./imagem/logo.svg" alt="">
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
            
            <div id="popupBg" class="popup-bg">
        <div id="popupLogin" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closeLogin()">&times;</span>
                <h2 class="font-1-l">Entrar</h2>
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

    <article class="grid">
    <?php if (!empty($produtos)): ?>
        <?php foreach ($produtos as $produto): ?>
            <div class="item-section">
                <div class="item-opcoes">
                    <div class="item-opcao_maior">
                        <img src="./imagem/camisa.png" alt="Imagem do Produto">
                    </div>
                    <div class="item-opcao_menor">
                        <div class="opcao-menor_bg"><img src="./imagem/camisa.png" alt="Imagem do Produto"></div>
                        <div class="opcao-menor_bg"><img src="./imagem/camisa.png" alt="Imagem do Produto"></div>
                        <div class="opcao-menor_bg"><img src="./imagem/camisa.png" alt="Imagem do Produto"></div>
                    </div>
                </div>
                <div class="item-content">
                    <h1 class="font-1-xxl"><?= htmlspecialchars($produto->nome) ?></h1>
                    <div class="info-content">
                        <img src="./imagem/estrela-amarela.svg" alt="Estrela Avaliação">
                        <p class="font-2-l">4,8</p>
                        <p class="font-2-l">300 vendidos</p>
                    </div>
                    <h2 class="font-1-xxl cor-p6"><?= htmlspecialchars($produto->valor) ?></h2>
                    <p class="font-1-s cor-6 p-after"><?= htmlspecialchars($produto->descricao) ?></p>
                    <h2 class="font-1-l">Variante do produto</h2>
                    <div class="variante-prod">
                        <form class="opcoes-tamanho" action="">
                            <label class="font-1-m cor-8" for="tamanho">Tamanho</label>
                            <select class="font-1-m-b cor-8 op-tamanhos" id="tamanho" name="tamanho">
                                <option value="p">P</option>
                                <option value="m">M</option>
                                <option value="g">G</option>
                                <option value="gg">GG</option>
                            </select>
                        </form>
                        <form class="opcoes-cor opcoes-tamanho" action="">
                            <label class="font-1-m cor-8" for="cor">Cor</label>
                            <select class="font-1-m-b cor-8 op-tamanhos" id="cor" name="cor">
                                <option value="branco">Branco</option>
                                <option value="preto">Preto</option>
                                <option value="cinza">Cinza</option>
                            </select>
                        </form>
                    </div>
                    <div class="btn-item">
                        <button class="btn_cheio btn_adc" type="button">Comprar Agora</button>
                        <button class="btn_vazado font-1-m-b" type="button">Adicionar ao Carrinho <img src="./imagem/adc-carrinho.svg" alt="Carrinho"></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
    <div class="detalhe-produto">
        <h2 class="cor-p1 font-2-l-b linha">Detalhes do Produto</h2>
        <h1 class="font-1-xl mgb-8px">T-shirt Front-End</h1>
        <p class="font-1-s cor-6 mgb-24px">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the.</p>
        <h2 class="font-2-l-b cor-p1">Avaliações</h2>
        
        <div class="avaliacoes">
            <div class="avaliacoes-estrelas">
                <div class="avaliacoes-estrelas_part1">
                    <div class="part1-circle">
                        <h2 class="font-1-l">4,8</h2>
                    </div>
                    <div class="part1-stars">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <p class="font-2-s">280 avaliações</p>
                    </div>
                </div>
                <div class="avaliacoes-estrelas_part2">
                    <div class="part2-topico">
                        <div class="fl line5">
                            <h2 class="font-1-l">5.0</h2>
                            <img src="./imagem/estrela-amarela.svg" alt="">
                        </div>
                        <!-- linha com after na .fl -->
                        <p class="font-2-s">180</p>
                    </div>
                    <div class="part2-topico">
                        <div class="fl line4">
                            <h2 class="font-1-l">4.0</h2>
                            <img src="./imagem/estrela-amarela.svg" alt="">
                        </div>
                        <!-- linha com after na .fl -->
                        <p class="font-2-s">40</p>
                    </div>
                    <div class="part2-topico">
                        <div class="fl line3">
                            <h2 class="font-1-l">3.0</h2>
                            <img src="./imagem/estrela-amarela.svg" alt="">
                        </div>
                        <!-- linha com after na .fl -->
                        <p class="font-2-s">30</p>
                    </div>
                    <div class="part2-topico">
                        <div class="fl line2">
                            <h2 class="font-1-l">2.0</h2>
                            <img src="./imagem/estrela-amarela.svg" alt="">
                        </div>
                        <!-- linha com after na .fl -->
                        <p class="font-2-s">20</p>
                    </div>
                    <div class="part2-topico">
                        <div class="fl line1">
                            <h2 class="font-1-l">1.0</h2>
                            <img src="./imagem/estrela-amarela.svg" alt="">
                        </div>
                        <!-- linha com after na .fl -->
                        <p class="font-2-s">10</p>
                    </div>
                </div>
            </div>
            <div class="avaliacoes-comentarios">
                <h2 class="font-2-l-b">Comentários</h2>
                
                <div class="comentario-usuario">
                    <div class="usuario-stars">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                    </div>
                    <p class="font-2-l">Muito confortável e não fica com mal odor.</p>
                    <p class="font-1-s cor-5 mgb-8px">07 março 2024</p>
                    <div class="usuario-img">
                        <img src="./imagem/user.svg" alt="">
                        <p class="font-1-m">Nome do usuário</p>
                    </div>
                </div>

                <div class="comentario-usuario">
                    <div class="usuario-stars">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                        <img src="./imagem/estrela-amarela.svg" alt="">
                    </div>
                    <p class="font-2-l">Muito confortável e não fica com mal odor.</p>
                    <p class="font-1-s cor-5 mgb-8px">07 março 2024</p>
                    <div class="usuario-img">
                        <img src="./imagem/user.svg" alt="">
                        <p class="font-1-m">Nome do usuário</p>
                    </div>
                </div>

                <div class="limitador">
                    <div class="limitador-item font-2-l-b">1</div>
                    <div class="limitador-item font-2-l-b">2</div>
                    <div class="limitador-item font-2-l-b">...</div>
                    <div class="limitador-item font-2-l-b">10</div>

                </div>
            </div>
        </div>
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