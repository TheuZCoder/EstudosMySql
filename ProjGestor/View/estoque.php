<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/View/estoque.css">
</head>
<body>
<?php include 'hearderLateral.php'; ?>
<?= template_header('GestorHeader') ?>

<div class="main_container">
    <div class="container-estoque">
    <section id="estoque">
        <h2>Estoque</h2>
        <div class="search-container">
            <input type="text" id="search" placeholder="Pesquisar material..." >
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Estoque</th>
                    <th>Quantidade</th>
                    <th>Material</th>
                </tr>
            </thead>
            <tbody id="estoque-table-body">
                <?php
                include 'estoqueResponse.php';
                $estoques = fetch_estoque_data();
                if (!empty($estoques)) {
                    foreach ($estoques as $estoque) {
                        echo "<tr>
                                <td>{$estoque['id_estoque']}</td>
                                <td>{$estoque['quantidade']}</td>
                                <td class='material-column'>" . get_material_name($estoque['material']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum item de estoque encontrado.</td></tr>";
                }

                function get_material_name($material) {
                    if (is_array($material) && isset($material['nome_material'])) {
                        return $material['nome_material'];
                    } else {
                        return $material;
                    }
                }
                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='cadastro-estoque.php'">Adicionar Item de Estoque</button>
    </section>
    </div>
</div>
<script>
    document.querySelectorAll('.mais div').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.parentElement.querySelector('input[type="number"]');
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.menos div').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.parentElement.querySelector('input[type="number"]');
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
</script>
</body>
</html>
