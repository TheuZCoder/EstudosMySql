<?php
// Funções para enviar dados para o backend
function cadastrar_estoque($nome_material, $quantidade, $fornecedor) {
    $url = 'http://localhost:8080/estoque';
    $data = array(
        'nome_material' => $nome_material,
        'quantidade' => $quantidade,
        'fornecedor' => $fornecedor
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response !== false;
}

function cadastrar_material($nome_material) {
    $url = 'http://localhost:8080/material';
    $data = array('nome_material' => $nome_material);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response !== false;
}

function cadastrar_fornecedor($nome_fornecedor, $cnpj_fornecedor) {
    $url = 'http://localhost:8080/fornecedor';
    $data = array(
        'nome_fornecedor' => $nome_fornecedor,
        'cnpj_fornecedor' => $cnpj_fornecedor
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response !== false;
}

// Processar envios de formulários
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cadastrar_estoque'])) {
        $nome_material = $_POST['nome_material'];
        $quantidade = $_POST['quantidade'];
        $fornecedor = $_POST['fornecedor'];
        if (cadastrar_estoque($nome_material, $quantidade, $fornecedor)) {
            header('Location: /View/estoque.php');
        } else {
            header('Location: /View/cadastro-estoque.php?error=estoque');
        }
    }

    if (isset($_POST['adicionar_material'])) {
        $novo_material = $_POST['novo_material'];
        if (cadastrar_material($novo_material)) {
            header('Location: /View/cadastro-estoque.php');
        } else {
            header('Location: /View/cadastro-estoque.php?error=material');
        }
    }

    if (isset($_POST['adicionar_fornecedor'])) {
        $nome_fornecedor = $_POST['nome_fornecedor'];
        $cnpj_fornecedor = $_POST['cnpj_fornecedor'];
        if (cadastrar_fornecedor($nome_fornecedor, $cnpj_fornecedor)) {
            header('Location: /View/cadastro-estoque.php');
        } else {
            header('Location: /View/cadastro-estoque.php?error=fornecedor');
        }
    }
}
?>
