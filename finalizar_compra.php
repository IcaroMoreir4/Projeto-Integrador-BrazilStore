<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "sua_base_de_dados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para obter os produtos
$sql = "SELECT nome_produto, preco, imagem FROM produtos";
$result = $conn->query($sql);
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
</head>
<body>
    <header>
        <a href="">
            <img src="imagem/logo.svg" class="logo" alt="logo">
        </a>
        <div class="categoria">
            <a href="" ><img src="imagem/categoria.svg" alt=""></a>
        </div>
        <div class="busca" id="Busca">
            <input type="search" class="pesquisar" id="txtBusca" placeholder="Pesquisar" size="50"/>
            <a href=""><img src="imagem/busca.svg" id="btnBusca" alt="Buscar"/></a>
          </div>
        <div class="iconn">
            <a href=""><img src="imagem/sino.svg" id="btnSino" class="icon-sino" alt=""></a>
            <a href=""><img src="imagem/carrinho.svg" alt="carrinho" id="btnCar" class="icon-carri"></a>
            <a href="/login.html"><img src="imagem/user.svg" alt="conta" id="btnUser" class="icon-user"></a>
        </div>
    </header>

    <main>
        <form action="codigo-finalizar-compra" method="post">

            <div class="titulo">
                <div class="titulo-conteudo">
                    <p class="font-1-xl">Finalizar compra</p>
                    <p class="font-1-l titulo-subtitulo">Veja seus produtos</p>
                </div>
            </div>

            <div class="conteudo-principal">
        
                <div class="lojaprodutos-listaprodutos">
                    <div class="lojas">
                        <div class="loja-1">
                            <div class="produtos">
                                <?php
                                if ($result->num_rows > 0) {
                                    // Saída dos dados de cada linha
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <div class="rev-produto-loja">
                                            <div class="checbox-produto">
                                                <input type="checkbox" id="merch-carrinho">
                                                <label for="merch-carrinho">
                                                    <div class="checbox-produto-img">
                                                        <figure><img src="'.$row["imagem"].'" alt=""></figure>
                                                    </div>
                                                </label>
                                                <div class="detalhes-rev-produto-loja">
                                                    <p class="font-1-l">'.$row["nome_produto"].'</p>
                                                    <p class="font-1-l alteracao-valor">R$ '.$row["preco"].'</p>
                                                </div>
                                            </div>
                                            <div class="rev-produto-loja-botoes">
                                                <div class="butt-quantidade">
                                                    <input type="button" value="-" class="font-2-l rev-butt-menos">
                                                    <p class="font-2-l">1</p>
                                                    <input type="button" value="+" class="font-2-l rev-butt-mais">
                                                </div>
                                                <input type="button" id="apagar-item-lixeira" class="butt-apagar">
                                            </div>
                                        </div>
                                        <hr>';
                                    }
                                } else {
                                    echo "0 resultados";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
        
                    <div class="listas-de-produtos">
                        <p class="font-1-l">Lista de produtos</p>
                        <!-- Aqui você pode adicionar código PHP para listar os produtos de forma semelhante -->
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

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
