<?php
require_once('../backend/database/DAO/PedidoDAO.php');

session_start();

if (isset($_SESSION['pedido_id'])) {
    $id_pedido = $_SESSION['pedido_id'];
    $pedidoDAO = new PedidoDAO();
    $valor = $pedidoDAO->valor_pedido($total);

    echo 'Valor da compra: ' . $valor;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forma_pagamento'])) {
        $forma_pagamento = $_POST['forma_pagamento'];
        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->atualizarFormaPagamento($forma_pagamento);

        // Finalizar a compra
        echo "<p>Compra realizada com sucesso! Forma de pagamento: $forma_pagamento</p>";

        
        header("Location: confirmacao.php");
        exit();
    } else {
        // Se o formulário não foi enviado, exibir o formulário de escolha de pagamento
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Escolher Forma de Pagamento</title>
        </head>
        <body>
        <h2>Escolher Forma de Pagamento</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="forma_pagamento">Escolha a forma de pagamento:</label>
            <select name="forma_pagamento" id="forma_pagamento">
                <option value="credito">Cartão de Crédito</option>
                <option value="debito">Cartão de Débito</option>
                <option value="boleto">Boleto Bancário</option>
            </select>
            <br><br>
            <input type="submit" value="Selecionar Forma de Pagamento">
        </form>
        </body>
        </html>
        <?php
    }
} else {
    
    echo "Erro: ID do pedido não encontrado.";
}
?>
