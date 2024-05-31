<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administração</title>
</head>
<body>
    <h1>Dashboard de Administração</h1>

    <h2>Usuários</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        // Incluir o arquivo que contém as funções para visualizar os usuários
        require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

        $usuariosDAO = new AdiminDAO();
        $usuarios = $usuariosDAO->VerTodosUsuario();

        // Loop através de todos os usuários e exibir em uma tabela
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>{$usuario->id}</td>";
            echo "<td>{$usuario->nome}</td>";
            echo "<td>{$usuario->email}</td>";
            echo "<td>";
            echo "<button onclick='excluirUsuario({$usuario->id})'>Excluir</button>";
            echo "<button onclick='enviarAlerta({$usuario->id})'>Enviar Alerta</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Vendedores</h2>
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
            echo "<button onclick='excluirVendedor({$vendedor->id})'>Excluir</button>";
            echo "<button onclick='enviarAlertaVendedor({$vendedor->id})'>Enviar Alerta</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Lojas</h2>
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
            echo "<button onclick='excluirLoja({$loja->id})'>Excluir</button>";
            echo "<button onclick='enviarAlertaLoja({$loja->id})'>Enviar Alerta</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

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
</body>
</html>
