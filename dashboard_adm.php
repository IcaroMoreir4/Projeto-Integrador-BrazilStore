<?php 

require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/AdiminDAO.php');

// Processar a requisição de exclusão de usuário ou envio de alerta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    $usuariosDAO = new AdiminDAO();

    if ($acao === 'excluirUsuario') {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $idUsuario = $_POST['id'];
            if ($usuariosDAO->delete_usuario($idUsuario)) {
                echo "<script>alert('Usuário excluído com sucesso.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
            } else {
                echo "<script>alert('Erro ao excluir o usuário.');</script>";
            }
        } else {
            echo "<script>alert('ID do usuário não fornecido.');</script>";
        }
        exit();
    } elseif ($acao === 'excluirVendedor') {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $idVendedor = $_POST['id'];
            if ($usuariosDAO->delete_vendedor($idVendedor)) {
                echo "<script>alert('Vendedor excluído com sucesso.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
            } else {
                echo "<script>alert('Erro ao excluir o vendedor.');</script>";
            }
        } else {
            echo "<script>alert('ID do vendedor não fornecido.');</script>";
        }
        exit();
    } elseif ($acao === 'excluirLoja') {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $idLoja = $_POST['id'];
            if ($usuariosDAO->delete_loja($idLoja)) {
                echo "<script>alert('Loja excluída com sucesso.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
            } else {
                echo "<script>alert('Erro ao excluir a loja.');</script>";
            }
        } else {
            echo "<script>alert('ID da loja não fornecido.');</script>";
        }
        exit();
    } elseif ($acao === 'enviarAlerta') {
        if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['mensagem_alerta']) && !empty($_POST['mensagem_alerta']) && isset($_POST['tipo'])) {
            $id = $_POST['id'];
            $mensagem = $_POST['mensagem_alerta'];
            $tipo = $_POST['tipo'];

            if ($tipo === 'cliente') {
                require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ClienteDAO.php');
                $clienteDAO = new ClienteDAO();

                if ($clienteDAO->enviarAlerta($id, $mensagem)) {
                    echo "<script>alert('Alerta enviado com sucesso para o cliente.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar o alerta para o cliente.');</script>";
                }
            } elseif ($tipo === 'vendedor') {
                require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
                $vendedorDAO = new VendedorDAO();

                if ($vendedorDAO->enviarAlerta($id, $mensagem)) {
                    echo "<script>alert('Alerta enviado com sucesso para o vendedor.'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
                } else {
                    echo "<script>alert('Erro ao enviar o alerta para o vendedor.');</script>";
                }
            }
        } else {
            echo "<script>alert('ID, mensagem ou tipo não fornecido.');</script>";
        }
        exit();
    }
}

$usuariosDAO = new AdiminDAO();
$usuarios = $usuariosDAO->VerTodosUsuario();
$vendedores = $usuariosDAO->VerTodosVendedores();
$lojas = $usuariosDAO->VerTodasLojas();
$produtos = $usuariosDAO->VerTodosProdutos();
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
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td class='font-1-s'>ID:{$usuario->id}</td>";
                    echo "<td class='font-1-m'>{$usuario->nome}</td>";
                    echo "<td class='font-1-s'>{$usuario->email}</td>";
                    echo "<td class='btn-adm'>";
                    echo "<button class='btn-alerta' onclick='abrirModalAlerta({$usuario->id}, \"cliente\")'>Alerta</button>";
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
                <?php
                foreach ($vendedores as $vendedor) {
                    echo "<tr>";
                    echo "<td>{$vendedor->id}</td>";
                    echo "<td>{$vendedor->nome}</td>";
                    echo "<td>{$vendedor->email}</td>";
                    echo "<td>";
                    echo "<button class='btn-excluir' onclick='excluirVendedor({$vendedor->id})'>Excluir</button>";
                    echo "<button class='btn-alerta' onclick='abrirModalAlerta({$vendedor->id}, \"vendedor\")'>Alerta</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="loja">
            <h2 class="font-1-l">Lojas</h2>
            <table>
            <?php
                foreach ($lojas as $loja) {
                    echo "<tr>";
                    echo "<td>{$loja->id}</td>";
                    echo "<td>{$loja->nome}</td>";
                    echo "<td>{$loja->endereco}</td>";
                    echo "<td>";
                    echo "<button class='btn-excluir' onclick='excluirLoja({$loja->id})'>Excluir</button>";
                    echo "<button class='btn-alerta' onclick='abrirModalAlerta({$loja->id}, \"loja\")'>Enviar Alerta</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div class="produto">
            <h2 class="font-1-l">Produtos</h2>
            <table>
                <tr>
                    <th>ID Vendedor</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                </tr>
                <?php foreach ($produtos as $produto): 
                    
                    ?>
                    
                <tr>
                    <td><?= $produto->id_vendedor ?></td>
                    <td><?= $produto->id ?></td>
                    <td><?= $produto->nome ?></td>
                    <td><?= $produto->descricao ?></td>
                    <td>R$<?= htmlspecialchars($produto->valor) ?></td>
                    <td><img src="uploads/<?= htmlspecialchars($produto->image_path) ?>" alt="<?= htmlspecialchars($produto->nome) ?>" width="100"></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
</div>

<!-- Modal para enviar alerta -->
<div id="modalAlerta" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="fecharModalAlerta()">&times;</span>
        <h2>Enviar Alerta</h2>
        <form id="formAlerta" method="POST">
            <input type="hidden" name="acao" value="enviarAlerta">
            <input type="hidden" name="id" id="idAlerta">
            <input type="hidden" name="tipo" id="tipoAlerta">
            <label for="mensagem_alerta">Mensagem:</label>
            <textarea id="mensagem_alerta" name="mensagem_alerta" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Enviar Alerta">
        </form>
    </div>
</div>

<!-- Formulário oculto para exclusão de usuário -->
<form id="excluirUsuarioForm" method="POST" style="display:none;">
    <input type="hidden" name="acao" value="excluirUsuario">
    <input type="hidden" name="id" id="usuarioId">
</form>

<!-- Formulário oculto para exclusão de vendedor -->
<form id="excluirVendedorForm" method="POST" style="display:none;">
    <input type="hidden" name="acao" value="excluirVendedor">
    <input type="hidden" name="id" id="vendedorId">
</form>

<!-- Formulário oculto para exclusão de loja -->
<form id="excluirLojaForm" method="POST" style="display:none;">
    <input type="hidden" name="acao" value="excluirLoja">
    <input type="hidden" name="id" id="lojaId">
</form>

<script>
    function excluirUsuario(id) {
        if (confirm('Tem certeza que deseja excluir este usuário?')) {
            document.getElementById('usuarioId').value = id;
            document.getElementById('excluirUsuarioForm').submit();
        }
    }

    function excluirVendedor(id) {
        if (confirm('Tem certeza que deseja excluir este vendedor?')) {
            document.getElementById('vendedorId').value = id;
            document.getElementById('excluirVendedorForm').submit();
        }
    }

    function excluirLoja(id) {
        if (confirm('Tem certeza que deseja excluir esta loja?')) {
            document.getElementById('lojaId').value = id;
            document.getElementById('excluirLojaForm').submit();
        }
    }

    function abrirModalAlerta(id, tipo) {
        document.getElementById('idAlerta').value = id;
        document.getElementById('tipoAlerta').value = tipo;
        document.getElementById('modalAlerta').style.display = 'block';
    }

    function fecharModalAlerta() {
        document.getElementById('modalAlerta').style.display = 'none';
    }
</script>
</body>
</html>
