<?php
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

// Processar a requisição de exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'excluirUsuario') {
    $idUsuario = $_POST['id'];
    $usuariosDAO = new AdiminDAO();

    if ($usuariosDAO->delete($idUsuario)) {
        echo "<script>alert('Usuário excluído com sucesso.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
    } else {
        echo "<script>alert('Erro ao excluir o usuário.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
    }
    exit();
}

$usuariosDAO = new AdiminDAO();
$usuarios = $usuariosDAO->VerTodosUsuario();
?>
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
    <h1 class="font-1-xl">ADMINISTRADOR</h1>
    <div class="gridadm">
        <div class="usuario">
            <h2 class="font-1-l">Usuários</h2>
            <table>
                <?php
               require_once('../Projeto-Integrador-BrazilStore/backend/database/');
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
        <!-- Repita para vendedores e lojas, conforme necessário -->
    </div>
</div>
</body>
</html>


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
    <h1 class="font-1-xl">ADMINISTRADOR</h1>
    <div class="gridadm">
        <div class="usuario">
            <h2 class="font-1-l">Usuários</h2>
            <table>
                <?php
                require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

                // Processar a requisição de exclusão
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'excluirUsuario') {
                    $idUsuario = $_POST['id'];
                    $usuariosDAO = new AdiminDAO();

                    if ($usuariosDAO->delete($idUsuario)) {
                        echo "Usuário excluído com sucesso.";
                    } else {
                        echo "Erro ao excluir o usuário.";
                    }

                    // Redirecionar para a mesma página para ver as mudanças
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }

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
                $vendedores = $vendedoresDao->VerTodosVendedores();

                // Loop através de todos os vendedores e exibir em uma tabela
                foreach ($vendedores as $vendedor) {
                    echo "<tr>";
                    echo "<td>{$vendedor->id}</td>";
                    echo "<td>{$vendedor->nome}</td>";
                    echo "<td>{$vendedor->email}</td>";
                    echo "<td>";
                    echo "<button class='btn-excluir' onclick='excluirVendedor({$vendedor->id})'>Excluir</button>";
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
</div>

<!-- Formulário oculto para exclusão de usuário -->
<form id="excluirUsuarioForm" method="POST" style="display:none;">
    <input type="hidden" name="acao" value="excluirUsuario">
    <input type="hidden" name="id" id="usuarioId">
</form>


<script>
    function excluirUsuario(id) {
    if (confirm('Tem certeza que deseja excluir este usuário?')) {
        document.getElementById('usuarioId').value = id;
        document.getElementById('excluirUsuarioForm').submit();
    }
}

</script>
</body>
</html>
