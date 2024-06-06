<?php
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/Produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/VendedorDAO.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/bootstrap.php'); // Adicionando o bootstrap do Doctrine

function getUploadPath($fileName) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/projeto-pi/Projeto-Integrador-BrazilStore/uploads/';
    $uploadPath = $uploadDir . $fileName;
    return $uploadPath;
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $tipo_entrega = $_POST['tipo_entrega'];

    if (isset($_SESSION['vendedor_id'])) {
        $id_vendedor = $_SESSION['vendedor_id'];

        if (!empty($nome) && !empty($valor) && !empty($descricao) && !empty($categoria) && !empty($peso) && !empty($tipo_entrega) && !empty($id_vendedor)) {
            $entityManager = getEntityManager(); // Obtendo a instância do EntityManager
            
            $vendedorDAO = new VendedorDAO($entityManager);
            
            if ($vendedorDAO->exists($id_vendedor)) {
                if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/projeto-pi/Projeto-Integrador-BrazilStore/uploads/';
                    $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);
                    
                    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
                        $uploadPath = getUploadPath($_FILES['imagem']['name']);
                        
                        $produto = new App\Entity\Produto($nome, $valor, $descricao, $categoria, $peso, $tipo_entrega, $id_vendedor); // Corrigindo o namespace da entidade Produto
                        $produto->setImagePath($_FILES['imagem']['name']);
                        $produtoDao = new ProdutoDAO($entityManager);
                        $produtoDao->create($produto);

                        header('Location: meus_produtos.php');
                        exit();
                    } else {
                        echo "Ocorreu um erro ao fazer o upload da imagem.";
                    }
                } else {
                    echo "Nenhuma imagem foi carregada.";
                }
            } else {
                echo "O ID do vendedor fornecido não existe.";
            }
        } else {
            echo "Por favor, preencha todos os campos do formulário.";
        }
    } else {
        echo "Você não está logado como vendedor.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
