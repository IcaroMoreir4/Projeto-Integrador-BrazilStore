<?php
    require_once(__DIR__ . '/../Projeto-Integrador-BrazilStore/backend/database/DAO/EnderecoDAO.php');

    session_start();

    $dao = new EnderecoDAO();


    //Função para consultar os endereços cadastrados e agregar o $_SESSION['ende_id'].
    if (isset($_SESSION['user_id'])) {
        $consl_ende = $dao->read($_SESSION['user_id']);

        if ($consl_ende) {
            $primeira_linha = $consl_ende[0];
            $ende_id = $primeira_linha['id'];
            $_SESSION['ende_id'] = $ende_id;
        }

        $limite = 3;
    }

    //Função para deletar o endereço.
    if (isset($_POST['del_ende'])){
        $del_ende = $dao->delete($_SESSION['ende_id']);
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
    <script src="./backend/implementacao/imp_endereco/cadast_ende.php"></script>

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
                        <p class="font-1-m" >Compras</p>
                        </div>
                    <div class="minhas-compras-texto">
                        <a class="font-1-s" href="Minhas_Compras.html">Minhas Compras</a>
                    </div>
                <button onclick="openCadastroLoja()" class="venda-agora font-1-m">Venda agora</button>
                </div>
            </div>



            <div class="endereçostitulo">
    <div class="endereçosbox">
        <div class="endereçotexto">
            <h1 class="font-1-l">Meus Endereços</h1>
            <button class="adicionarendereco font-1-m-b" onclick="openAddressPopup()">Adicionar Endereço<img src="imagem/+.svg" alt=""></button>
        </div>
        <div class="linhau"></div>
    </div>
    <div class="endereços-cadastrados">
        <?php if (!empty($consl_ende)): ?>
            <div name="consultar_endereco">
                <table>
                    <tbody>
                        <?php foreach ($consl_ende as $indice => $endereco): ?>
                            <?php if ($indice < $limite): ?>
                                <div class="endereçobox">
                                    <div class="endereço">
                                        <p class="font-1-s"><?php echo htmlspecialchars($endereco['nome_comp']); ?> | <?php echo htmlspecialchars($endereco['telefone_end']); ?></p>
                                        <p class="font-1-s"><?php echo htmlspecialchars($endereco['logradouro']); ?>, <?php echo htmlspecialchars($endereco['numero']); ?>, <?php echo htmlspecialchars($endereco['bairro']); ?></p>
                                        <p class="font-1-s"><?php echo htmlspecialchars($endereco['nome_cidade']); ?>, <?php echo htmlspecialchars($endereco['nome_estado']); ?>, <?php echo htmlspecialchars($endereco['cep']); ?></p>
                                    </div>
                                    <div class="endereçobtn">
                                        <div class="endereçoeditar">
                                            <div name="deletar_endereco">
                                                <form action="endereco-cliente.php" method="post">
                                                    <button class="excluir_end font-1-s" type="submit" name="del_ende">Excluir</button>
                                                </form>
                                            </div>
                                            <button class="editar_end font-1-s" onclick="openAlterarPopup()">Editar</button>
                                        </div>
                                        <!-- <button class="font-1-s end_padrão">Definir como padrão</button> -->
                                    </div>
                                </div>
                                <div class="linhau"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="font-1-m">você ainda não cadastrou um enedreço</p>
        <?php endif; ?>
    </div>
</div>


<div id="endereco_popup" name="popup_cadsatrar_endereco" style="display: none;" class="pop_cadas">
    <p class="font-1-m">Cadastrar endereço</p>
    <form action="./backend/implementacao/imp_endereco/cadast_ende.php" method="post">
        <label class="font-1-s" for="input_nome_cadsatrar_endereco" class="">Nome</label>
        <div id="nome_cadsatrar_endereco" class="nome">
            <input class="campo " type="text" name="nome" id="input_nome_cadsatrar_endereco" maxlength="40" placeholder="Nome">
        </div>

        <label class="font-1-s" for="input_telefone_cadsatrar_endereco" class="">Telefone</label>
        <div id="telefone_cadsatrar_endereco" class="telefone">
            <input class="campo" type="tel" name="tele" id="input_telefone_cadsatrar_endereco" maxlength="11" placeholder="Telefone">
        </div>

        <label class="font-1-s" for="input_logradouro_cadsatrar_endereco" class="">Logradouro</label>
        <div id="logradouro_cadsatrar_endereco" class="logradouro">
            <input class="campo" type="text" name="logr" id="input_logradouro_cadsatrar_endereco" maxlength="40" placeholder="Logradouro">
        </div>

        <label class="font-1-s" for="input_numero_cadsatrar_endereco" class="">Numero</label>
        <div id="numero_cadsatrar_endereco" class="numero">
            <input class="campo" type="number" name="num" id="input_numero_cadsatrar_endereco" maxlength="4" placeholder="Numero">
        </div>

        <label class="font-1-s" for="input_bairro_cadsatrar_endereco" class="">Bairro</label>
        <div id="bairro_cadsatrar_endereco" class="bairro">
            <input class="campo" type="text" name="barr" id="input_bairro_cadsatrar_endereco" maxlength="20" placeholder="Bairro">
        </div>

        <label class="font-1-s" for="input_cep_cadsatrar_endereco" class="">CEP</label>
        <div id="cep_cadsatrar_endereco" class="cep">
            <input class="campo" type="number" name="cep" id="input_cep_cadsatrar_endereco" maxlength="8" placeholder="CEP">
        </div>

        <label class="font-1-s" for="input_cidade_cadsatrar_endereco" class="">Cidade</label>
        <div id="cidade_cadsatrar_endereco" class="cidade">
            <input class="campo" type="text" name="munp" id="input_cidade_cadsatrar_endereco" maxlength="32" placeholder="Cidade">
        </div>

        <label class="font-1-s" for="input_estado_cadsatrar_endereco" class="">Estado</label>
        <div id="estado_cadsatrar_endereco" class="estado">
            <input class="campo" type="text" name="uf" id="input_estado_cadsatrar_endereco" maxlength="16" placeholder="Estado">
        </div>

        <div class="but-cadas">
            <button type="submit" class="font-1-m" >Cadastrar</button>
        </div>
    </form>
</div>


<div id="alterar_endereco_popup" name="alterar_endereco" class="pop_cadas">
    <p class="font-1-m">Alterar endereço</p>
    <form action="./backend/implementacao/imp_endereco/alt_ende.php" method="post">
        <label class="font-1-s" for="input_nome_alterar_endereco">Nome</label>
        <div class="nome">
            <input class="font-1-s campo" type="text" name="nome" id="input_nome_alterar_endereco" maxlength="40" placeholder="Nome" value="<?php echo htmlspecialchars($endereco['nome_comp']); ?>">
        </div>

        <label class="font-1-s" for="input_telefone_alterar_endereco">Telefone</label>
        <div class="telefone">
            <input class="font-1-s campo" type="tel" name="tele" id="input_telefone_alterar_endereco" maxlength="11" placeholder="Telefone" value="<?php echo htmlspecialchars($endereco['telefone_end']); ?>">
        </div>

        <label class="font-1-s" for="input_logradouro_alterar_endereco">Logradouro</label>
        <div class="logradouro">
            <input class="font-1-s campo" type="text" name="logr" id="input_logradouro_alterar_endereco" maxlength="40" placeholder="Logradouro" value="<?php echo htmlspecialchars($endereco['logradouro']); ?>">
        </div>

        <label class="font-1-s" for="input_numero_alterar_endereco">Numero</label>
        <div class="numero">
            <input class="font-1-s campo"type="number" name="num" id="input_numero_alterar_endereco" maxlength="4" placeholder="Numero" value="<?php echo htmlspecialchars($endereco['numero']); ?>">
        </div>

        <label class="font-1-s" for="input_bairro_alterar_endereco">Bairro</label>
        <div class="bairro">
            <input class="font-1-s campo" type="text" name="barr" id="input_bairro_alterar_endereco" maxlength="20" placeholder="Bairro" value="<?php echo htmlspecialchars($endereco['bairro']); ?>">
        </div>

        <label class="font-1-s" for="input_cep_alterar_endereco">CEP</label>
        <div class="cep">
            <input class="font-1-s campo" type="number" name="cep" id="input_cep_alterar_endereco" maxlength="8" placeholder="CEP" value="<?php echo htmlspecialchars($endereco['cep']); ?>">
        </div>

        <label class="font-1-s" for="input_cidade_alterar_endereco">Cidade</label>
        <div class="cidade">
            <input class="font-1-s campo" type="text" name="munp" id="input_cidade_alterar_endereco" maxlength="32" placeholder="Cidade" value="<?php echo htmlspecialchars($endereco['nome_cidade']); ?>">
        </div>

        <label class="font-1-s" for="input_estado_alterar_endereco">Estado</label>
        <div class="estado">
            <input class="font-1-s campo" type="text" name="uf" id="input_estado_alterar_endereco" maxlength="16" placeholder="Estado" value="<?php echo htmlspecialchars($endereco['nome_estado']); ?>">
        </div>

        <div class="but-cadas">
            <button name="editar_end" type="submit">Alterar</button>
        </div>
    </form>
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