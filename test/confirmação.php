<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
</head>
<body>
    <h2>Finalizar Compra</h2>
    <div>
        <?php
        if (isset($_SESSION['pedido_id'])) {
            $id_pedido = $_SESSION['pedido_id'];
            $pedidoDAO = new PedidoDAO();
            $valor = $pedidoDAO->valor_pedido($total);
            echo 'Valor da compra: ' . $valor;
            
            if (isset($_SESSION['forma_pagamento'])) {
                $forma_pagamento = $_SESSION['forma_pagamento'];
                $pedidoDAO = new PedidoDAO();
                $valor = $pedidoDAO->atualizarFormaPagamento($forma_pagamento);
            }
            echo 'Forma de pagamento: ' . $forma_pagamento;
            
            $_SESSION['pedidos']->create_item($valor, $forma_pagamento);
            
            header("Location: historicos_pedidos");
            exit();
        } else {
            echo "Erro: ID do pedido não encontrado.";
        }
        ?>
    </div>
</body>
</html>