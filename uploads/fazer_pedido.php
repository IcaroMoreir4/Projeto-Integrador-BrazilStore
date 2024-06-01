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
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/CarrinhoDAO.php');
        session_start();

        // Inicializar a variável $total
        $total = 0;

        if (isset($_SESSION['id_item'])) {
            $id_item = $_SESSION['id_item'];
            $carrinhoDAO = new CarrinhoDAO();
            $itens_carrinho = $carrinhoDAO->read($id_item);

            if ($itens_carrinho) {
                foreach ($itens_carrinho as $item) {
                    $total += $item['valor'];
                }
                echo 'Total do carrinho: ' . $total;

                $_SESSION['comprar']->create_pedido($total);

                header('Location: compra.php');
                exit();
            } else {
                echo 'Nenhum item encontrado';
            }
        } else {
            echo 'Nenhum item encontrado';
        }
        ?>
    </div>
</body>
</html>
