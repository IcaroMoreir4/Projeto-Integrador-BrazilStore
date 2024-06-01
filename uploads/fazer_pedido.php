<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>
<body>
    <h2>Carrinho de Compras</h2>
    <div>
        <?php
        require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/carrinho_item.php');
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/CarrinhoDAO.php');
        
        session_start();

        // Inicializar a variável $total
        $total = 0;

        if (isset($_SESSION['id'])) {
            $id_item = $_SESSION['id'];
            $carrinhoDAO = new CarrinhoDAO();
            $itens_carrinho = $carrinhoDAO->read();

            if ($itens_carrinho) {
                foreach ($itens_carrinho as $item) {
                    // Aqui presumo que você queira acessar o valor do item
                    $total += $item['valor'];
                }
                echo 'Total do carrinho: ' . $total;

                $_SESSION['comprar']->create_pedido($total);

                // Removido o redirecionamento aqui

            } else {
                echo 'Nenhum item encontrado';
            }
        } else {
            echo 'Nenhum item encontrado';
        }
        ?>
    </div>

    <?php
    // Redirecionamento movido para depois da impressão do HTML
    header('Location: compra.php');
    exit();
    ?>
</body>
</html>
