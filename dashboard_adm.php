<!DOCTYPE html>
<html lang="pt-br">
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

<div class="adm-box">
    <h1 class="font-1-xl">ADIMINISTRADOR</h1>

<div class="gridadm">
    <div class="usuario">
    <h2 class="font-1-l">Usuários</h2>
    <table>

        <?php
        // Incluir o arquivo que contém as funções para visualizar os usuários
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

        $usuariosDAO = new AdiminDAO();
        $usuarios = $usuariosDAO->VerTodosUsuario();

        // Loop através de todos os usuários e exibir em uma tabela
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td class='font-1-s'>ID:{$usuario->id}</td>";
            echo "<td class='font-1-m'>{$usuario->nome}</td>";
            echo "<td class='font-1-s'> {$usuario->email}</td>";
            echo "<td class='btn-adm'>";
            echo "<button class='btn-alerta' onclick='enviarAlerta({$usuario->id})'>Alerta</button>";
            echo "<button class='btn-excluir' onclick='excluirUsuario({$usuario->id})'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
<div class="vendedor">
    <h2 class="font-1-l">Vendedores</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        $vendedoresDao = new AdiminDAO();
        $vendedores = $vendedoresDao-> VerTodosVendedores();

        // Loop através de todos os vendedores e exibir em uma tabela
        foreach ($vendedores as $vendedor) {
            echo "<tr>";
            echo "<td>{$vendedor->id}</td>";
            echo "<td>{$vendedor->nome}</td>";
            echo "<td>{$vendedor->email}</td>";
            echo "<td>";
            echo "<button  class='btn-excluir'onclick='excluirVendedor ({$vendedor->id})'>Excluir</button>";
            echo "<button class='btn-alerta' onclick='enviarAlertaVendedor({$vendedor->id})'>Alerta</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
<div class="loja">
    <h2 class="font-1-l">Lojas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
        <?php
        $lojaDAO = new AdiminDAO();
        $lojas = $lojaDAO->VerTodasLojas();

        // Loop através de todas as lojas e exibir em uma tabela
        foreach ($lojas as $loja) {
            echo "<tr>";
            echo "<td>{$loja->id}</td>";
            echo "<td>{$loja->nome}</td>";
            echo "<td>{$loja->endereco}</td>";
            echo "<td>";
            echo "<button class='btn-excluir' onclick='excluirLoja({$loja->id})'>Excluir</button>";
            echo "<button class='btn-alerta' onclick='enviarAlertaLoja({$loja->id})'>Enviar Alerta</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
    </div>

    <script>
        // Funções de ação para usuários
        function excluirUsuario(id) {
            if (confirm("Tem certeza que deseja excluir este usuário?")) {
                // Aqui você pode fazer uma requisição AJAX para excluir o usuário
                alert("Usuário excluído com sucesso!");
                // Atualizar a página após excluir o usuário
                location.reload();
            }
        }

        function enviarAlerta(id) {
            // Aqui você pode implementar a lógica para enviar um alerta para o usuário
            alert("Alerta enviado para o usuário!");
        }

        // Funções de ação para vendedores
        function excluirVendedor(id) {
            if (confirm("Tem certeza que deseja excluir este vendedor?")) {
                // Aqui você pode fazer uma requisição AJAX para excluir o vendedor
                alert("Vendedor excluído com sucesso!");
                // Atualizar a página após excluir o vendedor
                location.reload();
            }
        }

        function enviarAlertaVendedor(id) {
            // Aqui você pode implementar a lógica para enviar um alerta para o vendedor
            alert("Alerta enviado para o vendedor!");
        }

        // Funções de ação para lojas
        function excluirLoja(id) {
            if (confirm("Tem certeza que deseja excluir esta loja?")) {
                // Aqui você pode fazer uma requisição AJAX para excluir a loja
                alert("Loja excluída com sucesso!");
                // Atualizar a página após excluir a loja
                location.reload();
            }
        }

        function enviarAlertaLoja(id) {
            // Aqui você pode implementar a lógica para enviar um alerta para a loja
            alert("Alerta enviado para a loja!");
        }
    </script>
    </div>
</body>
</html>
