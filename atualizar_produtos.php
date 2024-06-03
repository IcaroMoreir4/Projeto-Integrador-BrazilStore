<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
session_start();

if (!isset($_SESSION['vendedor_id'])) {
    header('Location: login.php');
    exit();
}

$id_vendedor = $_SESSION['vendedor_id'];
$produtoDao = new ProdutoDAO();

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $produto = $produtoDao->buscarProdutoPorId($id_produto);

    if ($produto['id_vendedor'] != $id_vendedor) {
        echo "Você não tem permissão para editar este produto.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $tipo_entrega = $_POST['tipo_entrega'];
    $image_path = $_POST['image_path'];

    $produto = new Produto($nome, $valor, $descricao, $categoria, $peso, $tipo_entrega, $id_vendedor);
    $produto->setId($id_produto);
    $produto->setImagePath($image_path);

    $produtoDao->AtualizarProdutos($produto);

    header('Location: meus_produtos.php');
    exit();
} else {
    echo "Produto não encontrado.";
    exit();
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
                <a href="#" onclick="openPerfil()" id="userProfile"><img class="icon" src="./imagem/user.svg" alt=""></a>
                <div class="perfil_btn" id="perfilBtn">
                    <div class="perfil_menu font-1-m" id="perfilMenu">
                        <a href="./perfil.php">Meu perfil</a>
                        <a href="./logout.php">Sair da conta</a>
                    </div>
                </div>
        </header>
        
        <article class="grid editar-bg">
            <h1 class="font-1-xl editar-bg_title ">Editar Produto</h1>
            <form class="editar-bg_form" method="POST" action="atualizar_produtos.php">

                <input type="hidden" name="id_produto" value="<?php echo $produto['id']; ?>">
                <label class="font-1-m">Nome:</label>

                <input type="text" name="nome" value="<?php echo $produto['nome']; ?>"><br>
                <label class="font-1-m">Categoria:</label>

                <input type="text" name="categoria" value="<?php echo $produto['categoria']; ?>"><br>
                <label class="font-1-m">Valor:</label>

                <input type="text" name="valor" value="<?php echo $produto['valor']; ?>"><br>
                <label class="font-1-m">Descrição:</label>

                <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea><br>
                <label class="font-1-m">Peso:</label>

                <input type="text" name="peso" value="<?php echo $produto['peso']; ?>"><br>
                <label class="font-1-m">Tipo de Entrega:</label>

                <input type="text" name="tipo_entrega" value="<?php echo $produto['tipo_entrega']; ?>"><br>
                <label class="font-1-m">Image Path:</label>

                <input type="text" name="image_path" value="<?php echo $produto['image_path']; ?>"><br>
                <button type="submit" class="btn_cheio btn_adc">Editar</button>
            </form>
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
