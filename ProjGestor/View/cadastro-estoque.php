<?php
// Funções para buscar dados do backend
function fetch_material_data() {
    $url = 'http://localhost:8080/material';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        return [];
    }

    return json_decode($response, true);
}

function fetch_fornecedor_data() {
    $url = 'http://localhost:8080/fornecedor';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        return [];
    }

    return json_decode($response, true);
}

// Obter dados
$materiais = fetch_material_data();
$fornecedores = fetch_fornecedor_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/View/cadastro-estoque.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
<?= template_header('GestorHeader') ?>

<div class="main_container">
<div class="cadastro-estoque-container">
    <h2>Cadastro de Estoque</h2>
    <form id="cadastro_estoque_form" action="cadastro-estoqueResponse.php" method="post">
        <div class="form-group">
            <label for="nome_material">Nome do Material</label>
            <select id="nome_material" name="material_id">
                <?php foreach ($materiais as $material): ?>
                    <option value="<?= htmlspecialchars($material['id_material']) ?>">
                        <?= htmlspecialchars($material['nome_material']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade">
        </div>
        <div class="form-group">
            <label for="fornecedor">Fornecedor</label>
            <select id="fornecedor" name="fornecedor">
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?= htmlspecialchars($fornecedor['id_fornecedor']) ?>">
                        <?= htmlspecialchars($fornecedor['nome_fornecedor']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" onclick="prepareFormData()">Cadastrar Estoque</button>
    </form>
</div>

    <div class="linha-divisoria"></div>

    <div class="cadastro-outros-container">
        <div class="cadastro-material-container">
            <h2>Cadastro de Material</h2>
            <form action="cadastro-estoqueResponse.php" method="post">
                <div class="form-group">
                    <label for="novo_material">Nome do Novo Material</label>
                    <input type="text" id="novo_material" name="novo_material">
                </div>
                <button type="submit" name="adicionar_material">Adicionar Material</button>
            </form>
        </div>
        
        <div class="cadastro-fornecedor-container">
            <h2>Cadastro de Fornecedor</h2>
            <form action="cadastro-estoqueResponse.php" method="post">
                <div class="form-group">
                    <label for="nome_fornecedor">Nome do Novo Fornecedor</label>
                    <input type="text" id="nome_fornecedor" name="nome_fornecedor">
                    <label for="cnpj_fornecedor">CNPJ do Novo Fornecedor</label>
                    <input type="text" id="cnpj_fornecedor" name="cnpj_fornecedor" placeholder="00.000.000/0000-00">
                </div>
                <button type="submit" name="adicionar_fornecedor">Adicionar Fornecedor</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
